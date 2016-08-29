<div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li style="<?php echo $navHome;?>">
                        <a href="ministryOfficerHome.php" style="<?php echo $textHome;?>"><i class="fa fa-home fa-2x" aria-hidden="true"></i> Home</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#collapse1" style="<?php echo $navMembers;?> ; <?php echo $textMembers;?>"><i class="fa fa-users fa-2x"></i>  Members <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="collapse1" class="<?php echo $colMembers;?>">
                            <li style="<?php echo $navAddMembers;?>">
                                <a href="min_off_addEmployee.php" style="<?php echo $textAddMembers;?>">Add Members</a>
                            </li>
                            <li style="<?php echo $navUpdateMembers;?>">
                                <a href="min_off_updateEmployeeFront.php" style="<?php echo $textUpdateMembers;?>">Update Members</a>
                            </li>
                        </ul>
                    </li>
                   
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#collapse2" style="<?php echo $navInstitute;?> ; <?php echo $textInstitute;?>"><i class="fa fa-university fa-2x" aria-hidden="true"></i> Institutes <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="collapse2" class="<?php echo $colInstitute;?>">
                            <li style="<?php echo $navAddZonalInstitute;?>">
                                <a href="min_off_addZonalOffice.php" style="<?php echo $textAddZonalInstitute;?>">Add Zonal</a>
                            </li>
                            <li style="<?php echo $navAddSchoolInstitute;?>">
                                <a href="min_off_addSchool.php" style="<?php echo $textAddSchoolInstitute;?>">Add School</a>
                            </li>
                            <li style="<?php echo $navUpdateSchoolInstitute;?>">
                                <a href="min_off_updateSchool.php" style="<?php echo $textUpdateSchoolInstitute;?>">Update School</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#collapse3" style="<?php echo $navSubject;?> ; <?php echo $textSubject;?>"><i class="fa fa-book fa-2x" aria-hidden="true" ></i> Subject <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="collapse3" class="<?php echo $colSubject;?>">
                            <li style="<?php echo $navAddSubject;?>">
                                <a href="min_off_addSubject.php" style="<?php echo $textAddSubject;?>">Add Subject</a>
                            </li>
                            <li style="<?php echo $navUpdateSubject;?>">
                                <a href="min_off_updateSubjectFront.php" style="<?php echo $textUpdateSubject;?>">Update Subject</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#collapse4" style="<?php echo $navSearch;?> ; <?php echo $textSearch;?>"><i class="fa fa-search fa-2x" aria-hidden="true"></i> Search <i class="fa fa-fw fa-caret-down"></i></a>


                        <ul id="collapse4" class="<?php echo $colSearch;?>">
                            <li style="<?php echo $navSearchMembers;?>">
                                <a href="min_off_searchUser.php" style="<?php echo $textSearchMembers;?>">Search Members</a>

                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#collapse5" style="<?php echo $navTransfer;?> ; <?php echo $textTransfer;?>"><i class="fa fa-exchange fa-2x" aria-hidden="true"></i> Transfer <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="collapse5" class="<?php echo $colTransfer;?>">
                            <li style="<?php echo $navTransferTeach;?>">
                                <a href="min_off_transferFront.php" style="<?php echo $textTransferTeach;?>">Transfer Teacher</a>
                            </li>
                            
                            
                        </ul>
                    </li>


                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#collapse6" style="<?php echo $navReport;?> ; <?php echo $textReport;?>"><i class="fa fa-file-text fa-2x" aria-hidden="true"></i> Reports <i></i></a>
                        <ul id="collapse6" class="<?php echo $colReport;?>">
                            <li style="<?php echo $navviewReport;?>">
                                <a href="SubjectWise.php" style="<?php echo $textviewReport;?>">View Reports</a>
                            </li>
                            
                            
                        </ul>
                    </li>

                   <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#collapse7"  style="<?php echo $navVacancy;?> ; <?php echo $textVacancy; ?>"><i class="fa fa-university fa-2x" aria-hidden="true"></i>Vacancy <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="collapse7" class="collapse <?php echo $colVacancy; ?>">
                            
                            <li style="<?php echo $navViewVacancy?>">
                                <a href="viewVacancy.php" style="<?php echo $textViewVacancy?>">View Vacancies</a>
                            </li>
                            
                        </ul>
                    </li>
                    
                    <li>
                        <a href="mapview.php" data-toggle="collapse" data-target="#collapse8" style="<?php echo $navMap;?> ; <?php echo $textMap;?>"><i class="fa fa-map-marker fa-2x" aria-hidden="true"></i> View Map <i class="fa fa-fw"></i></a>

                    </li>
                </ul>
</div>




                   
             