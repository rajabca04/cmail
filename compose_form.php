<div class="modal fade" id="insert">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <input type="text" name="to" placeholder="To:" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="subject" placeholder="Subject:" class="form-control">
                    </div>
 
                    <div class="mb-3">
                        <textarea name="msg" placeholder="Write messege here:" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>

                    <div class="mb-3">
                        <input type="submit" value="send" name="send" class="brn btn-success">
                        <input type="submit" value="save" name="save" class="brn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- PHP Code -->

<?php

if(isset($_POST['send'])){

    
    $to = getuser($_POST['to']);
    $to = $to['id'];

    $subject = $_POST['subject'];
    $msg = $_POST['msg'];
   
    $from =getuser();
    $from = $from['id'];

    $query = mysqli_query($connect,"insert into mail (send_by,send_to,subject,body) value ('$from','$to','$subject','$msg')");
    redirect('main');
}

?>