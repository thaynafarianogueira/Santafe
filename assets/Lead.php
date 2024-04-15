<?php
namespace Assets;

final class Lead 
{
    private $id = null;
    private $name;
    private $address;
    private $email;
    private $service;
    private $phone;
    private $zipcode;
    private $msg;
    private $createdAt = null;
    private $updatedAt = null;
    private $deletedAt = null;

    public function __construct($name, $address, $email, $service, $phone, $zipcode, $msg) {
        $this->id = null;
        $this->name = $name;
        $this->address = $address;
        $this->email = $email;
        $this->service = $service;
        $this->phone = $phone;
        $this->zipcode = $zipcode;
        $this->msg = $msg;
        $this->createdAt = Helper::now();
        $this->updatedAt = Helper::now();
        $this->deletedAt = null;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getService() {
        return $this->service;
    }

    public function setService($service) {
        $this->service = $service;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getZipcode() {
        return $this->zipcode;
    }

    public function setZipcode($zipcode) {
        $this->zipcode = $zipcode;
    }

    public function getMsg() {
        return $this->msg;
    }

    public function setMsg($msg) {
        $this->msg = $msg;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;
    }

    public function getDeletedAt() {
        return $this->deletedAt;
    }

    public function setDeletedAt($deletedAt) {
        $this->deletedAt = $deletedAt;
    }
    public function save($conn) {
        $paramsAndValues = [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'address' => $this->getAddress(),
            'email' => $this->getEmail(),
            'service' => $this->getService(),
            'phone' => $this->getPhone(),
            'zipcode' => $this->getZipcode(),
            'msg' => $this->getMsg(),
            'created_at' => is_null($this->getId()) ? NULL : $this->getCreatedAt(),
            'updated_at' => $this->getUpdatedAt(),
            'deleted_at' => $this->getDeletedAt(),
        ];
        return $conn->save($paramsAndValues, 'lead');
    }
}
