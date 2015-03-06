<?php
/**
 * Created by James Robertson
 * Date: 6/03/15
 * Time: 9:19 AM
 */

namespace Jarobe\XeroBundle\Model;


class Contact {

    /**
     * @var bool
     */
    private $customer;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $emailAddress;

    /**
     * @var array
     */
    private $addresses;

    function __construct()
    {
        $this->addresses = [];
    }

    /**
     * @return boolean
     */
    public function isCustomer()
    {
        return $this->customer;
    }

    /**
     * @param boolean $customer
     * @return $this
     */
    public function setIsCustomer($customer)
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return $this
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return $this
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @param string $emailAddress
     * @return $this
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
        return $this;
    }

    /**
     * @return array
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * @param array $addresses
     * @return $this
     */
    public function setAddresses($addresses)
    {
        $this->addresses = $addresses;
        return $this;
    }

    /**
     * @param Address $address
     * @return $this
     */
    public function addAddress(Address $address){
        $this->addresses[]= $address;
        return $this;
    }

    /**
     * @return bool
     */
    public function isValid(){
        return true;
    }

    /**
     * @return array
     */
    public function toArray(){
        $contactArr =  [
            "IsCustomer"    => $this->isCustomer(),
            'Name'          => $this->getName(),
            "FirstName"     => $this->getFirstName(),
            "LastName"      => $this->getLastName(),
            "EmailAddress"  => $this->getEmailAddress(),
        ];
        $addressArr = [];
        $addressArr['Address'] = [];
        foreach($this->getAddresses() as $address){
            /**
             * @var Address $address
             */
            $addressArr['Address'][] = $address->toArray();
        }

        $contactArr["Addresses"] = $addressArr;
        return $contactArr;
    }
}