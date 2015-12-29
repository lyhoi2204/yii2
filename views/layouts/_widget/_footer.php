<?php
use app\models\Info;

$info = Info::find()->one();

?>
<footer id="footer">
            <div class="container">       
                <div class="column-one-fourth">
                    <h5 class="line"><span>Contact.</span></h5>
                    <p>Name  : <?= $info['name'] ?></p>
                    <p>Email : <?= $info['email'] ?></p>
                    <p>Skype : <?= $info['skype'] ?></p>
                </div>

                <div class="column-two-fourth">
                    <h5 class="line"><span>About.</span></h5>
                    
                    <p>About : <?= $info['description'] ?></p>
                </div>


                <p class="copyright">Copyright (c). All Rights Reserved</p>
            </div>
        </footer>