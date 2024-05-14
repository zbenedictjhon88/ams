<?php

//    session_start();

    class APM
    {

        private function conn()
        {
            $serverName = "localhost";
            $username = "root";
            $password = "";
            $database = "apm";

            $conn = new mysqli($serverName, $username, $password, $database);
            if($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            return $conn;
        }

        private function get_DateTime()
        {
            return date('Y-m-d H:i:s');
        }

        public function get_TotalOccupiedRoom()
        {
            $conn = $this->conn();

            $sql = "SELECT COUNT(*) AS total FROM rooms WHERE assignedTo IS NOT NULL";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['total'];
            } else {
                echo 0;
            }

            $conn->close();
        }

        public function get_TotalAvailableRoom()
        {
            $conn = $this->conn();

            $sql = "SELECT COUNT(*) AS total FROM rooms WHERE assignedTo IS NULL";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['total'];
            } else {
                echo 0;
            }

            $conn->close();
        }

        public function get_TotalRoom()
        {
            $conn = $this->conn();

            $sql = "SELECT COUNT(*) AS total FROM rooms";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['total'];
            } else {
                echo 0;
            }

            $conn->close();
        }

        public function get_TotalTenant()
        {
            $conn = $this->conn();

            $sql = "SELECT COUNT(*) AS total FROM tenants";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['total'];
            } else {
                echo 0;
            }

            $conn->close();
        }

        public function addFeedback($data)
        {
//            $status = false;
//            $conn = $this->conn();
//
//            $sql = "INSERT INTO feedbacks (created_at, updated_at, name, email, message)
//                    VALUES ('" . $this->get_DateTime() . "', '" . $this->get_DateTime() . "', '" . $data['name'] . "', '" . $data['email'] . "', '" . $data['message'] . "')";
//
//            if($conn->query($sql) === TRUE) {
//                $status = true;
//            }
//
//            $conn->close();
//
//            return $status;
        }

        public function addComplain($data)
        {
            $status = false;
            $conn = $this->conn();

            $sql = "INSERT INTO complaints (created_at, updated_at, subject, description, tenant_id)
                    VALUES ('" . $this->get_DateTime() . "', '" . $this->get_DateTime() . "', '" . $data['subject'] . "', '" . $data['description'] . "', '" . $data['tenant_id'] . "')";

            if($conn->query($sql) === TRUE) {
                $status = true;
            }

            $conn->close();

            return $status;
        }

        public function getComplain($tenantId)
        {

            $conn = $this->conn();

            $sql = "SELECT * FROM complaints WHERE tenant_id = '" . $tenantId . "'";
            $result = $conn->query($sql);
            $conn->close();

            return $result;
        }

        public function deleteComplain($id)
        {
            $status = false;
            $conn = $this->conn();

            $sql = "DELETE FROM complaints WHERE id=" . $id;

            if($conn->query($sql) === TRUE) {
                $status = true;
            }

            return $status;
        }

        public function getActiveMenu($menu, $withManagement = 0)
        {
            $rooms = array('rooms', 'addRoom');
            $tenants = array('tenants', 'addTenant');
            $complaints = array('complaints', 'addComplain');

            if(in_array($menu, $rooms)) {
                $getActiveFileMenu = basename("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", ".php");
                if($menu == $getActiveFileMenu) {
                    echo "active";
                } elseif(strstr($getActiveFileMenu, "viewRoom") || strstr($getActiveFileMenu, "updateRoom")) {
                    if($withManagement) {
                        echo 'active';
                    }
                }
            }

            if(in_array($menu, $tenants)) {
                $getActiveFileMenu = basename("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", ".php");
                if($menu == $getActiveFileMenu) {
                    echo "active";
                } elseif(strstr($getActiveFileMenu, "viewTenant") || strstr($getActiveFileMenu, "updateTenant") || strstr($getActiveFileMenu, "addTenant")) {
                    if($withManagement) {
                        echo 'active';
                    }
                }
            }

            if(in_array($menu, $complaints)) {
                $getActiveFileMenu = basename("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", ".php");
                if($menu == $getActiveFileMenu) {
                    echo "active";
                } elseif(strstr($getActiveFileMenu, "viewComplain") || strstr($getActiveFileMenu, "updateComplain")) {
                    if($withManagement) {
                        echo 'active';
                    }
                }
            }
        }

    }

    $config['BASED_URL'] = "http://localhost/ams";

    if($_POST) {
        if(isset($_POST['feedback'])) {
            $apm = new APM();
            $result = $apm->addFeedback($_POST);
            if($result) {
                $arr['message'] = "Thank you for reaching out! We truly value your feedback and will do our best to address your concerns or suggestions promptly. Your input helps us improve our services for you and others. Have a great day!";
            } else {
                $arr['message'] = "Please try again. Thank you!";
            }

            echo json_encode($arr);
        }

        if(isset($_POST['complain'])) {
            $apm = new APM();
            $result = $apm->addComplain($_POST);
            if($result) {
                $arr['message'] = "Successfully added.";
            } else {
                $arr['message'] = "Please try again. Thank you!";
            }

            echo json_encode($arr);
        }

        if(isset($_POST['complaints'])) {

            $complaints = array();

            $apm = new APM();
            $result = $apm->getComplain($_POST['tenantId']);
            if($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                    $complaint = array(
                        'id' => $row['id'],
                        'subject' => $row['subject'],
                        'description' => $row['description'],
                        'action_taken' => $row['action_taken'] == null ? '' : $row['action_taken']
                    );
                    array_push($complaints, $complaint);
                }
            }

            echo json_encode($complaints);
        }

        if(isset($_POST['userId']) && isset($_POST['userEmail'])) {
            $_SESSION['userId'] = $_POST['userId'];
            $_SESSION['userEmail'] = $_POST['userEmail'];

            echo $_SESSION['userId'];
            echo $_SESSION['userEmail'];
        }
    }



    if($_GET) {
        if($_GET['get'] == 'delete') {
            $apm = new APM();
            $apm->deleteComplain($_GET['complaintId']);
            header('Location: ' . $config['BASED_URL'] . '/app/tenant/complaints.php');
        }
    }

    