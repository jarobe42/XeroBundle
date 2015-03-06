<?php
/**
 * Created by James Robertson
 * Date: 6/03/15
 * Time: 9:33 AM
 */

namespace Jarobe\XeroBundle\Model\Accounting;


class LineItem {
    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $quantity;

    /**
     * @var integer
     * In cents, so amount needs to be divided by 100 before sending to xero.
     */
    private $unitAmount;

    /**
     * @var string
     */
    private $accountCode;

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param string $quantity
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return string
     */
    public function getUnitAmount()
    {
        return $this->unitAmount;
    }

    /**
     * @param string $unitAmount
     * @return $this
     */
    public function setUnitAmount($unitAmount)
    {
        $this->unitAmount = $unitAmount;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountCode()
    {
        return $this->accountCode;
    }

    /**
     * @param string $accountCode
     * @return $this
     */
    public function setAccountCode($accountCode)
    {
        $this->accountCode = $accountCode;
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
        $itemArr = [
            "Description"   => $this->getDescription(),
            "Quantity"      => $this->getQuantity(),
            "UnitAmount"    => $this->getUnitAmount()/100,
            "AccountCode"   => $this->getAccountCode()
        ];
        return $itemArr;
    }
}