<div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li style="<?php echo $navHome;?>">
                        <a href="homePrincipal.php" style="<?php echo $textHome;?>"><i class="fa fa-home fa-2x" aria-hidden="true"></i> Home</a>
                    </li>
                    
                   
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#collapse2"  style="<?php echo $navVacancy?> ; <?php echo $textVacancy;?>"><i class="fa fa-university fa-2x" aria-hidden="true"></i>Vacancy <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="collapse2" class="collapse <?php echo $colVacancy?>">
                            <li style="<?php echo $navAddVacancy?>">
                                <a href="addVacancyPrincipal.php" style="<?php echo $textAddVacancy?>">Add Vacancies</a>
                            </li>
                            <li style="<?php echo $navViewVacancy?>">
                                <a href="viewVacancy.php" style="<?php echo $textViewVacancy?>">View Vacancies</a>
                            </li>
                            
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#collapse3" style="<?php echo $navSubject;?> ; <?php echo $textSubject;?>"><i class="fa fa-book fa-2x" aria-hidden="true"></i> Subject <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="collapse3" class="collapse <?php echo $colSubject?>">
                            
                            <li style="<?php echo $navAddCurrentSubject?>">
                                <a href="addCurrentSubjectFormFront_Principal.php" style="<?php echo $textAddCurrentSubject?>">Add Current subject Of Teacher</a>
                            </li>
                            
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#collapse4" style="<?php echo $navSearch;?> ; <?php echo $textSearch;?>"><i class="fa fa-search fa-2x" aria-hidden="true"></i> Search <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="collapse4" class="collapse <?php echo $colSearch;?>">
                            
                            <li style="<?php echo $navSearchMembers;?>">
                                <a href="searchUserPrincipal.php" style="<?php echo $textSearchMembers;?>">Search Members</a>
                            </li>
                            
                        </ul>
                    </li>


        
       
       
                    <li>
                        <a href="mapviewPrincipal.php" class="ajax_load slide_font" style="<?php echo $navMap;?> ; <?php echo $textMap;?>"><i class="fa fa-map-marker fa-2x" aria-hidden="true"></i> View Map <i class="fa fa-fw"></i></a>
                    </li>

                </ul>
</div>




                   
             