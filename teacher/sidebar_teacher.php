<div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li style="<?php echo $navHome;?>">
                        <a href="teacher_home.php" style="<?php echo $textHome;?>"><i class="fa fa-home fa-2x" aria-hidden="true"></i> Home</a>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#collapse4" style="<?php echo $navSearch;?> ; <?php echo $textSearch;?>"><i class="fa fa-search fa-2x" aria-hidden="true"></i> Search <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="collapse4" class="<?php echo $colSearch;?>">

                            <li style="<?php echo $navSearchMembers;?>">
                                <a href="teacher_searchUser.php" style="<?php echo $textSearchMembers;?>">Search Members</a>
                            </li>
                            <li style="<?php echo $navViewVacancy;?>">
                                <a href="viewVacancy.php" style="<?php echo $textViewVacancy;?>">Search Vacancy</a>
                            </li>
                        </ul>

                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#collapse5" style="<?php echo $navTransfer;?> ; <?php echo $textTransfer;?>"><i class="fa fa-exchange fa-2x" aria-hidden="true"></i> Transfer <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="collapse5" class="<?php echo $colTransfer;?>">
                            <li style="<?php echo $navTransferTeach;?>">
                                <a href="transerrequestform.php" style="<?php echo $textTransferTeach;?>">Transfer Request</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="mapview.php" data-toggle="collapse" data-target="#collapse7" style="<?php echo $navMap;?> ; <?php echo $textMap;?>"><i class="fa fa-map-marker fa-2x" aria-hidden="true"></i> View Map <i class="fa fa-fw"></i></a>
                    </li>

                </ul>
</div>




                   
             