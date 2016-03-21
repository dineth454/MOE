<?php


class Donor
{
    //add donor method
    function addDonor($fname, $lname, $email, $nic, $contact, $city, $birthday, $gender, $donorType, $bloodType, $donatedBefore, $donationPeriod, array $equipments)
    {
        require("Database.php");
        $insertOK =1;


        $db = Database::getInstance();
        $mysqli = $db->getConnection();

        $fnameR = $mysqli->real_escape_string($fname);
        $lnameR = $mysqli->real_escape_string($lname);
        $emailR = $mysqli->real_escape_string($email);
        $nicR = $mysqli->real_escape_string($nic);
        $contactR = $mysqli->real_escape_string($contact);
        $cityR = $mysqli->real_escape_string($city);
        $birthdayR = $mysqli->real_escape_string($birthday);
        $genderR = $mysqli->real_escape_string($gender);
        $donorTypeR = $mysqli->real_escape_string($donorType);

        $insertDonorTableQuery = "INSERT INTO donor (fName, lName, email,nic,contact,city,birthday,gender,donorTypeID) VALUES ('$fnameR', '$lnameR','$emailR', '$nicR','$contactR','$cityR','$birthdayR','$genderR','$donorTypeR')";
        $result = $mysqli->query($insertDonorTableQuery);


        if ($result == 1) {
            $getDonorIDQuery = "SELECT MAX(donorID)as donorid FROM donor";
            $donorIDResult = $mysqli->query($getDonorIDQuery);
            $donorIDArray = mysqli_fetch_assoc($donorIDResult);
            $donorID = $donorIDArray["donorid"];

            if ($donorType == 1) {
                $insertBloodDonorTableQuery = "INSERT INTO bloodDonor VALUES ('$donorID','$bloodType','$donatedBefore',$donationPeriod)";
                $result1 = $mysqli->query($insertBloodDonorTableQuery);

                if($result1 !=1){
                    $insertOK =0;

                }
            } else if ($donorType == 2) {
                foreach ($equipments as $equip) {
                    $insertEquipDonorTableQuery = "INSERT INTO equipmentdonor VALUES ('$donorID','$equip')";
                    $result2 = $mysqli->query($insertEquipDonorTableQuery);

                    if($result2 !=1){
                        $insertOK =0;

                    }

                }
            }else{
                $insertBloodDonorTableQuery = "INSERT INTO blooddonor VALUES ('$donorID','$bloodType','$donatedBefore',$donationPeriod)";
                $result3 = $mysqli->query($insertBloodDonorTableQuery);

                foreach ($equipments as $equip) {
                    $insertEquipDonorTableQuery = "INSERT INTO equipmentdonor VALUES ('$donorID','$equip')";
                    $result4 = $mysqli->query($insertEquipDonorTableQuery);
                }

                if($result3 !=1 ||$result4 !=1 ){
                    $insertOK =0;

                }
            }
        } else {
            $insertOK =0;

        }

        if($insertOK == 1){

            echo '<script language="javascript">';
            echo 'alert("You have successfully registered as a donor!!!  Thank You.")';
            echo '</script>';


        }else{
            echo '<script language="javascript">';
            echo 'alert("Registration Failed !!! Please Try Again.)';
            echo '</script>';
        }

    }



    function searchBloodDonors($bloodType ,$city){
        require("Database.php");

        $db = Database::getInstance();
        $mysqli = $db->getConnection();

        $searchBloodDonorQuery ="SELECT fNAme,lName,email,nic,contact,birthday,b.donatedBefore,b.donationPeriod,gender FROM donor d ,blooddonor b WHERE d.donorTypeID='1' or d.donorTypeID='3' and b.bloodTypeID = '$bloodType' and d.donorID = b.donorID and d.city='$city'";

        $bloodDonorList = $mysqli->query($searchBloodDonorQuery);
        $bloodDonorListArray = mysqli_fetch_all($bloodDonorList);


    return $bloodDonorListArray;

    }
    function searchEquipmentDonors(array $equipments ,$city){
        require("Database.php");

        $db = Database::getInstance();
        $mysqli = $db->getConnection();

        if(sizeof($equipments==1)){
            $singleEquipment = $equipments[0];
            $queryForOneEquipment = "SELECT fNAme,lName,email,nic,contact,birthday,gender FROM donor d ,equipmentdonor e WHERE  e.equipmentID = '$singleEquipment' and d.city='$city' and d.donorID = e.donorID";

            $equipmentDonorList = $mysqli->query($queryForOneEquipment);
            $equipmentListArray = mysqli_fetch_all($equipmentDonorList);
        }else if(sizeof($equipments==1)){
            $equipmentOne = $equipments[0];
            $equipmentTwo = $equipments[1];

            $queryForTwoEquipments = "SELECT fNAme,lName,email,nic,contact,birthday,gender FROM donor d ,equipmentdonor e WHERE (e.equipmentID = '$equipmentOne' or e.equipmentID = '$equipmentTwo') and d.city='$city' and d.donorID = e.donorID group by d.donorID";

            $equipmentDonorList = $mysqli->query($queryForTwoEquipments);
            $equipmentListArray = mysqli_fetch_all($equipmentDonorList);
        }else{

            $equipmentOne = $equipments[0];
            $equipmentTwo = $equipments[1];
            $equipmentThree = $equipments[2];

            $queryForThreeEquipments = "SELECT fNAme,lName,email,nic,contact,birthday,gender FROM donor d ,equipmentdonor e WHERE (e.equipmentID = '$equipmentOne' or e.equipmentID = '$equipmentTwo' or e.equipmentID = '$equipmentThree') and d.city='$city' and d.donorID = e.donorID group by d.donorID";

            $equipmentDonorList = $mysqli->query($queryForThreeEquipments);
            $equipmentListArray = mysqli_fetch_all($equipmentDonorList);
        }
    return $equipmentListArray;
    }

}