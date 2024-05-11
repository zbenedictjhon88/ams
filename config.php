<?php

    $config['BASED_URL'] = "http://localhost/ams";
    $config['SERVER_HOST'] = "http://localhost:8000";
    $config['API_KEY'] = "somesupersecretkeyhere";
    $config['ACTIVE_LINK'] = basename("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", ".php");

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

    }
    