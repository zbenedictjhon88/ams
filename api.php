<?php

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

    }

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
    }