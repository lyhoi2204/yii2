<?php
use app\models\Info;
$fb = Info::find()->one();
?>
<div class="column-one-third">
		<div class="sidebar">
            <h5 class="line"><span>Facebook.</span></h5>
                <iframe src="http://www.facebook.com/plugins/likebox.php?href=<?= $fb['facebook'] ?>&amp;width=298&amp;height=258&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;border_color=%23BCBCBC&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:298px; height:258px;" allowTransparency="true"></iframe>
        </div>
</div>