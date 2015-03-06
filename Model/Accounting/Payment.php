<?php
/**
 * Created by James Robertson
 * Date: 6/03/15
 * Time: 3:30 PM
 */

namespace Jarobe\XeroBundle\Model\Accounting;


class Payment {
    /**
     * @var integer
     */
    private $paymentId;

    /**
     * @var string
     */
    private $invoiceId;

    /**
     * @var string
     */
    private $accountCode;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var integer
     * In cents, so amount needs to be divided by 100 before sending to xero.
     */
    private $amount;

    /**
     * @return string
     */
    public function getInvoiceId()
    {
        return $this->invoiceId;
    }

    /**
     * @param string $invoice
     * @return $this
     */
    public function setInvoiceId($invoiceId)
    {
        $this->invoiceId = $invoiceId;
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
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(){
        $itemArr = [
            "Reference" => $this->getPaymentId(),
            "Invoice"   => [
                "InvoiceID" => $this->getInvoiceId()
            ],
            "Account"   => [
                "Code" => $this->getAccountCode()
            ],
            "Date"      => $this->getDate()->format("Y-m-d"),
            "Amount"    => $this->getAmount()/100,
        ];
        return $itemArr;
    }

    /**
     * @return int
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }

    /**
     * @param int $paymentId
     * @return $this
     */
    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;
        return $this;
    }
}