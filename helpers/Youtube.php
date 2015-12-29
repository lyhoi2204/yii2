<?php

namespace app\helpers;

use Yii;
use yii\helpers\ArrayHelper;
use Exception;

/**
  https://www.youtube.com/feeds/videos.xml?channel_id=CHANNELID
  https://www.youtube.com/feeds/videos.xml?user=USERNAME
  https://www.youtube.com/feeds/videos.xml?playlist_id=YOUR_YOUTUBE_PLAYLIST_NUMBER
  #
  $channel_id = 'XXX'; // put the channel id here
  $youtube = file_get_contents('https://www.youtube.com/feeds/videos.xml?channel_id='.$channel_id);
  $xml = simplexml_load_string($youtube, "SimpleXMLElement", LIBXML_NOCDATA);
  $json = json_encode($xml);
  $youtube = json_decode($json, true);
  $yt_vids = array();
  $count = 0;
  foreach ($youtube['entry'] as $k => $v) {
  $yt_vids[$count]['id'] = str_replace('http://www.youtube.com/watch?v=', '', $v['link']['@attributes']['href']);
  $yt_vids[$count]['title'] = $v['title'];
  $count++;
  }
  print_r($yt_vids);
 */
class Youtube extends Crawler {

    public $sevenDaysAgo = '';

    public function __construct() {
        $this->sevenDaysAgo = strtotime('-7 days');
    }

    private function sendWarning($msg = '') {
        $date = date('h:i:s d/m/Y');
        Yii::warning("In class Youtube: {$date} \n MSG: {$msg} \n", 'Cronjob');
    }

    public function getAllChannelOfUser() {
        $url = [];
        $subConditionSave = Yii::$app->params['conditionSubscriberSave'];
        foreach (YoutubeUser::find()->where('updated_at <=:sevenDay', [':sevenDay' => $this->sevenDaysAgo])->limit(10)->each() as $key => $value) {
            $value->updateAttributes(['updated_at' => time()]);
            /**
             * @vertify url youtube user
             */
            if (strpos($value->url, '/user/') !== false) {
                /**
                 * @create youtube url videos
                 */
                $value->url = str_replace(['/about', '/videos'], "", $value->url);
                $value->url = $value->url . "/videos";
                /**
                 * @check page exits
                 */
                if ($this->checkPageExits($value->url)) {
                    $url[] = $value->url;
                    /**
                     * @get all videos of url https://www.youtube.com/user/<user>/videos
                     */
                    $html = $this->getPage($value->url);
                    try {
                        $main = $html->find("#c4-header-bg-container", 0);
                        /**
                         * @get cover
                         */
                        $cover = $this->getCover($html->find("#gh-banner style", 0)->innertext);
                        /**
                         * @get avatar
                         */
                        $avatar = $main->find(".channel-header-profile-image", 0)->src;
                        /**
                         * yt-subscription-button-subscriber-count-branded-horizontal
                         * @get count 
                         */
                        $count = $html->find(".yt-subscription-button-subscriber-count-branded-horizontal", 0)->title;
                        $count = (int) str_replace([',', '.'], "", $count);
                        /**
                         * @Check Validate the subcribe number > $subConditionSave
                         */
                        if ($count >= $subConditionSave) {
                            /**
                             * @get video and channel of user
                             */
                            $content = @file_get_contents('https://www.youtube.com/feeds/videos.xml?user=' . $value->username);
                            $xml = @simplexml_load_string($content, "SimpleXMLElement", LIBXML_NOCDATA);
                            $json = @json_encode($xml);
                            $datas = @json_decode($json, true);
                            if (isset($datas['entry'])) {
                                foreach ($datas['entry'] as $data) {
                                    $channel = $this->getChannel($value->username, $data['author']['name'], $data['author']['uri'], $cover, $avatar);
                                    if (isset($data['id']) && $channel) {
                                        $id = $this->trimVideoId($data['id']);
                                        $title = ArrayHelper::getValue($data, 'title', '');
                                        if (!VideoSource::find()->where('code=:id', [':id' => $id])->exists()) {
                                            $model = new VideoSource();
                                            $model->attributes = [
                                                'title' => $title,
                                                'slug' => Common::renderSlug($title),
                                                'code' => $id,
                                                'category' => 0,
                                                'channel' => $channel,
                                                'feature' => CmDefine::no,
                                                'popular' => CmDefine::no,
                                                'show_index' => 0,
                                                'total_view' => rand(100, 10000),
                                                'total_comment' => CmDefine::zeroNumber,
                                                'total_like' => CmDefine::zeroNumber,
                                                'total_dislike_number' => CmDefine::zeroNumber,
                                                'avatar' => "//i.ytimg.com/vi/{$id}/mqdefault.jpg",
                                                'tags' => '',
                                                'description' => '',
                                                'seo_title' => $title,
                                                'seo_keyworks' => $title,
                                                'seo_description' => $title,
                                                'status' => CmDefine::status_pending,
                                                'type' => VideoSource::TYPE_YOUTUBE
                                            ];
                                            $model->save();
                                        }
                                    }
                                }
                            }
                        } else {
                            continue;
                        }
                    } catch (Exception $exc) {
                        
                    }
                }
            }
        }
        $this->sendWarning("Job: youtube/channel-of-user, checked url: " . implode("\n", $url));
    }

    private function checkPageExits($url) {
        $headers = @get_headers($url);
        if (strpos($headers[0], '200') === false)
            return false;
        else
            return true;
    }

    private function getCover($str) {
        @preg_match_all('#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#', str_replace(['//'], "http://", $str), $match);
        if (isset($match[0][0])) {
            return $match[0][0];
        }
        return false;
    }

    /**
     * 
     * @param type $msg
     * return related user
     */
    public function getRelatedUser($msg = '') {
        $channelHasUsed = [];
        foreach (YoutubeUser::find()->distinct()->where('updated_at <=:sevenday', [':sevenday' => $this->sevenDaysAgo])->orderBy(['id' => SORT_DESC])->limit(10)->each() as $user) {
            $user->updateAttributes(['updated_at' => time()]);
            if (!in_array($user->username, $channelHasUsed)) {
                $channelHasUsed[] = $user->username;
                $html = $this->getPage($user->url);
                try {
                    $main = $html->find("#content", 0);
                    $user->updateAttributes([
                        'avatar' => $main->find(".channel-header-profile-image", 0)->src
                    ]);
                    $rightMenu = $main->find('.branded-page-v2-secondary-col', 0);
                    $subscriberCount = isset($html->find(".yt-subscription-button-subscriber-count-branded-horizontal", 0)->title) || false;
                    if ($subscriberCount && $rightMenu) {
                        foreach ($rightMenu->find(".branded-page-related-channels-list a") as $value) {
                            $userName = str_replace(['/user/', '/channel/'], "", $value->href);
                            if (!in_array($userName, $channelHasUsed)) {
                                $channelHasUsed[] = $userName;
                                if (strpos($value->href, '/user/') !== false) {
                                    try {
                                        echo "\n==== User {$userName}===\n";
                                        $avatar = $value->find('img', 0)->{'data-thumb'};
                                        $this->saveYoutubeUser($userName, $avatar, $msg);
                                    } catch (Exception $ex) {
                                        echo "Error user: " . ($value->href) . " \n";
                                    }
                                }
                            }
                        }
                        echo "\n==================================\n";
                    }
                    $html->clear();
                } catch (Exception $exc) {
                    
                }
            }
        }
        $this->sendWarning("Job youtube/get-channel-user: Hoàn tất quá trình chạy crobjob \n Các kênh đã chạy qua là:" . json_encode($channelHasUsed));
        unset($channelHasUsed);
        echo $msg;
    }

    /**
     * 
     * @param string $subscriberCount ex:838,780
     * @return boolean true|false
     */
    private function conditonSave($subscriberCount) {
        return ((int) str_replace([',', '.'], "", $subscriberCount) > Yii::$app->params['conditionSubscriberSave']);
    }

    /**
     * 
     * @param string $user
     * @param string $avatar
     */
    private function saveYoutubeUser($user, $avatar = '', &$msg = '') {
        if (!YoutubeUser::find()->where(['username' => $user])->exists()) {
            $model = new YoutubeUser();
            $model->attributes = [
                'name' => ucfirst($user),
                'username' => $user,
                'url' => "https://www.youtube.com/user/{$user}",
                'avatar' => $avatar,
                'count_video' => 0,
                'status' => CmDefine::status_enable,
            ];
            if ($model->save()) {
                $msg = "{$msg}\n Save user: {$user}\n";
            }
        }
    }

    private function getChannel($youtubeUser, $channelName, $uri, $cover = '', $avatar = '') {
        $slug = Common::renderSlug($channelName);
        if (!$data = VideoChannel::find()->where('youtube_channel_id=:youtube_channel_id', [':youtube_channel_id' => $channelName])->one()) {
            $userId = isset(Yii::$app->user) ? Yii::$app->user->id : 1;
            $data = new VideoChannel();
            $data->attributes = [
                'title' => $channelName,
                'slug' => Common::renderSlug($channelName),
                'feature' => 0,
                'popular' => 0,
                'user_id' => 1,
                'cover' => $cover,
                'avatar' => $avatar,
                'tags' => '',
                'total_view' => 0,
                'total_source' => 0,
                'seo_title' => $channelName,
                'seo_keyworks' => $channelName,
                'seo_description' => $channelName,
                'status' => Common::status_pending,
                'description' => '',
                'uri' => $uri,
                'category_id' => 0,
                'youtube_user' => $youtubeUser,
                'youtube_channel_id' => $channelName
            ];
            $data->save();
        }
        $data->id;
    }

    /**
      https://www.youtube.com/feeds/videos.xml?channel_id=CHANNELID
      https://www.youtube.com/feeds/videos.xml?user=USERNAME
      https://www.youtube.com/feeds/videos.xml?playlist_id=YOUR_YOUTUBE_PLAYLIST_NUMBER
     */
    public function rssUser() {
        foreach (YoutubeUser::find()->where('updated_at <=:sevenDay', [':sevenDay' => $this->sevenDaysAgo])->limit(10)->each() as $user) {
            $user->updateAttributes(['updated_at' => time()]);
            try {
                $i = 0;
                $content = @file_get_contents('https://www.youtube.com/feeds/videos.xml?user=' . $user->username);
                $xml = @simplexml_load_string($content, "SimpleXMLElement", LIBXML_NOCDATA);
                $json = @json_encode($xml);
                $youtube = @json_decode($json, true);
                if (isset($youtube['entry'])) {
                    foreach ($youtube['entry'] as $value) {
                        if (isset($value['id'])) {
                            $id = $this->trimVideoId($value['id']);
                            $title = ArrayHelper::getValue($value, 'title', '');
                            if (!VideoSource::find()->where('code=:id', [':id' => $id])->exists()) {
                                $i++;
                                list($chanel, $category) = $this->getChannel($user->username, $value['author']['name'], $value['author']['uri']);
                                $model = new VideoSource();
                                $model->attributes = [
                                    'title' => $title,
                                    'slug' => Common::renderSlug($title),
                                    'code' => $id,
                                    'category' => 0,
                                    'channel' => $chanel,
                                    'feature' => CmDefine::no,
                                    'popular' => CmDefine::no,
                                    'show_index' => 0,
                                    'total_view' => rand(100, 10000),
                                    'total_comment' => CmDefine::zeroNumber,
                                    'total_like' => CmDefine::zeroNumber,
                                    'total_dislike_number' => CmDefine::zeroNumber,
                                    'avatar' => "//i.ytimg.com/vi/{$id}/mqdefault.jpg",
                                    'tags' => '',
                                    'description' => '',
                                    'seo_title' => $title,
                                    'seo_keyworks' => $title,
                                    'seo_description' => $title,
                                    'status' => CmDefine::status_pending,
                                    'type' => VideoSource::TYPE_YOUTUBE
                                ];
                                $model->save();
                            }
                        }
                    }
                }
                $user->updateAttributes(['count_video' => $i]);
            } catch (Exception $exc) {
                
            }
        }
    }

    private function trimVideoId($id) {
        return str_replace(['yt:video:'], "", $id);
    }

//    public function updateCover() {
//        $i = 0;
//        $per_page = 1000;
//        $rows = true;
//        while ($rows) {
//            $rows = VideoChannel::find()->select(['id', 'avatar', 'uri', 'cover', 'status'])->where('(cover="" OR avatar="") AND status IN(1,2)')
//                    ->limit($per_page)
//                    ->offset($i)
//                    ->orderBy(['id' => SORT_ASC])
//                    ->all();
//            if ($rows) {
//                foreach ($rows as $value) {
//                    try {
//                        $html = $this->getPage($value->uri);
//                        $main = $html->find("#c4-header-bg-container", 0);
//                        $value->title = $value->title;
//                        $value->slug = $value->slug;
//                        $avatar = $value->avatar;
//                        if (@$main->find(".channel-header-profile-image", 0)->src) {
//                            $avatar = $main->find(".channel-header-profile-image", 0)->src;
//                        }
//                        $cover = $value->cover;
//                        if ($cover = $this->getCover($html->find("#gh-banner style", 0)->innertext)) {
//                            $cover = $cover;
//                        }
//                        $value->updateAttributes([
//                            'avatar' => $avatar,
//                            'cover' => $cover
//                        ]);
//                        $html->clear();
//                    } catch (Exception $exc) {
//                        echo "\n Err: " . $value->uri;
//                    }
//                }
//            }
//            $i += $per_page;
//            echo "\n========================================================\n";
//        }
//    }

    public function __destruct() {
        $this->user = null;
    }

}
