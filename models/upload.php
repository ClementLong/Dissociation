<?php

move_uploaded_file($_FILES['webcam']['tmp_name'], '../web/image/uploads/'.date('YmdHis').'.jpg');

