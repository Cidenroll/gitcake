<div class="bitballs form">




<?php echo $this->Form->create(false, array('url'=>'display','method'=>'post')); ?>
<?php


echo $this->Form->input(false, array(
        'type' => 'radio',
        'id' => 'radioButtonForm',
        'name' => 'radioButtonForm',
        'options' => array(0=>'Random Generate', 1=>'Select Colors'),
        'default'=>0,
        'seperator' => '<br />'

));

    echo $this->Form->label('Balls', 'Number of colors', array('class'=>'mandatory'));
    echo $this->Form->text( 'Balls', array( 'type' => 'number','max'=>$counter ) );
    echo '<br/ >';
    echo $this->Form->label('Colors', 'Generate Colors', array('class'=>'mandatory'));
    ?><br /><center>
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="colorModal">Select Colors</button>
        </center>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="width:90%; height:90%;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Color Select</h4>
                </div>
                <div class="modal-body">


                        <div class="form-check">
                    <?php



                    foreach ($totalballs as $balldex => $ballkey){
//                        echo "<input type=\"checkbox\" class=\"form-check-input\" id=\"ball_$balldex\" style='margin-bottom: 0px;'>
//                     <label class=\"form-check-label\" for=\"ball_$balldex\">$ballkey</label>";
                        echo "<input class=\"checks\" type=\"checkbox\" name=\"ball_$balldex\" value=\"$ballkey\" style='margin-bottom: 0px;'>$ballkey<br /><br />";
                    }

                    ?>
                        </div>

                </div>
                <div class="modal-footer">
                    <a id="saveChangesModal" class="btn btn-primary odom-submit" onclick="getValue();return false;">Save changes</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



<?php

    echo $this->Form->text( 'Colors', array( 'type' => 'text', 'placeholder'=>'Preview of colors selected from the modal menu' ) );

    echo $this->Form->button('Reset the Form', array('type' => 'reset','class'=>'btn-primary'));
    echo $this->Form->button('Submit', array('type' => 'submit','class'=>'btn-warning'));

    ?>

</div>
<div class="actions">

    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <h3><?php echo __('There are only '.$counter.' bitballs in the db. To add more, click the button below.'); ?></h3>
        <li><?php echo $this->Html->link(__('Create New Ball'), array('controller'=>'bitballs','action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Return to Menu'), array('controller'=>'pages','action' => 'index')); ?></li>

    </ul>
</div>

<script type="text/javascript">
$(document).ready(function() {
    document.getElementById('Colors').readOnly = true;
    $('#colorModal').prop('disabled', true);
});
$('#radioButtonForm0').on('click',function(){
    document.getElementById('Balls').readOnly = false;
    document.getElementById('Colors').readOnly = true;
    $('#colorModal').prop('disabled', true);
});
$('#radioButtonForm1').on('click',function(){
    document.getElementById('Balls').readOnly = true;
    document.getElementById('Colors').readOnly = true;
    $('#colorModal').prop('disabled', false);
});

$(function () {
    $('body').on('click', '.odom-submit', function (e) {
        $(this.form).submit();
        $('#myModal').modal('hide');
    });
});

function getValue(){

    console.log('Clicked modal submit!');
    var counterChecked = 0;
    var checks = document.getElementsByClassName('checks');
    var str= "";
    var colorLength = <?php echo $counter; ?>;
    for(i=0; i< colorLength; i++){
        if(checks[i].checked === true){
            str += checks[i].value + ", ";
            counterChecked++;
        }


    }
    console.log(str);

    var newstr;
    newstr = str.substring(0, str.length-1);
    //document.getElementById("Colors").placeholder = str;
    document.getElementById("Colors").value = newstr;

}


</script>