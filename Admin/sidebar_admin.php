<div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li style="<?php echo $navHome;?>">
                        <a href="adminHome.php" style="<?php echo $textHome;?>"><i class="fa fa-home fa-2x" aria-hidden="true"></i> Home</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#collapse1" style="<?php echo $navMembers;?> ; <?php echo $textMembers;?>"><i class="fa fa-users fa-2x"></i>  Members <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="collapse1" class="<?php echo $colMembers;?>">

                            <li style="<?php echo $navAddMembers;?>">
                                <a href="admin_addEmployee.php" style="<?php echo $textAddMembers;?>">Add Members</a>
                            </li>

                            <li style="<?php echo $navUpdateMembers;?>">
                                <a href="admin_updateEmployeeFront.php" style="<?php echo $textUpdateMembers;?>">Update Members</a>
                            </li>

                            <li style="<?php echo $navDeleteMembers;?>">
                                <a href="admin_deleteEmployeeFront.php" style="<?php echo $textDeleteMembers;?>">Remove Members</a>
                            </li>

                        </ul>
                    </li>


                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#collapse2" style="<?php echo $navSearch;?> ; <?php echo $textSearch;?>"><i class="fa fa-search fa-2x" aria-hidden="true"></i> Search <i class="fa fa-fw fa-caret-down"></i></a>

                        <ul id="collapse2" class="<?php echo $colSearch;?>">
                            <li style="<?php echo $navSearchMembers;?>">
                                <a href="admin_searchUser.php" style="<?php echo $textSearchMembers;?>">Search Members</a>

                            </li>
                        </ul>
                    </li>

                </ul>
</div>




                   
             