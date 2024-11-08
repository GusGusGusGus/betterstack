<?php

/**
 * User model
 */
class User extends BaseModel{
	
	// Define neccessary constansts so we know from which table to load data
	const tableName = 'users';
	// ClassName constant is important for find and findOne static functions to work
	const className = 'User';
	
	// Create getter functions
	
	public function getName() {
		return $this->getField('name');
	}
	
	public function getEmail() {
		return $this->getField('email');
	}
	
	public function getCity() {
		return $this->getField('city');
	}

	public function getPhone() {
        return $this->getField('phone');
    }

    public function insert($data) {
        $stmt = $this->db->mysqli->prepare("INSERT INTO " . self::tableName . " (name, email, city, phone) VALUES (?, ?, ?, ?)");
        if ($stmt === false) {
            die("Prepare failed: (" . $this->db->mysqli->errno . ") " . $this->db->mysqli->error);
        }

        $stmt->bind_param('ssss', $data['name'], $data['email'], $data['city'], $data['phone']);
        if (!$stmt->execute()) {
            die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        }

        $stmt->close();
    }
	
}