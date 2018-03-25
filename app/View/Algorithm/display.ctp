<div class="display form">
    <?php
       // print_r($gotballs);echo "<br><br>";
       // print_r($group);

    ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12"><center><strong>Distribution</strong></center></div>
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Color</th>
                            <th>Number</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 1;
                            foreach ($gotballs as $ballcolor => $ballnumber){
                                echo "<tr><td>$i</td><td>$ballcolor</td><td>$ballnumber</td></tr>";
                                $i++;
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div><br />
            <div class="col-lg-12"><center><strong>Grouping</strong></center></div>
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Group No.</th>
                            <th>Details</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        foreach ($group as $groupdex => $groupdets){
                            echo "<tr><td>$i</td><td>";
                            echo "<ul class=\"list-group\">";
                                foreach ($groupdets as $grcolor => $groupnumber){

                                    echo "<li class=\"list-group-item\">$grcolor : $groupnumber</li>";

                                }

                            echo "</ul></td></tr>";
                            $i++;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>
<div class="actions">
    <h3><?php echo __('Saving info in the logs table...'); ?></h3>
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Return to Menu'), array('controller'=>'pages','action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Return to Form'), array('controller'=>'algorithm','action' => 'algorithm')); ?></li>
    </ul>
</div>