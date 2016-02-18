<?php
/**
 * Created by James Robertson
 * Date: 6/03/15
 * Time: 9:15 AM
 */

namespace Jarobe\XeroBundle\Model\Accounting;

use Jarobe\XeroBundle\Model\Contact;

class Invoice {
    /**
     * @var string
     */
    private $invoiceNumber;

    /**
     * @var string
     */
    private $type;

    /**
     * @var Contact
     */
    private $contact;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var \DateTime
     */
    private $dueDate;

    /**
     * @var string
     */
    private $lineAmountTypes;

    /**
     * @var array
     */
    private $lineItems;

    /**
     * @var string
     */
    private $status;

    function __construct()
    {
        $this->lineItems = [];
    }

    /**
     * @return string
     */
    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    /**
     * @param string $invoiceNumber
     * @return $this
     */
    public function setInvoiceNumber($invoiceNumber)
    {
        $this->invoiceNumber = $invoiceNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return Contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     * @return $this
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
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
     * @return \DateTime
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @param \DateTime $dueDate
     * @return $this
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getLineAmountTypes()
    {
        return $this->lineAmountTypes;
    }

    /**
     * @param string $lineAmountTypes
     * @return $this
     */
    public function setLineAmountTypes($lineAmountTypes)
    {
        $this->lineAmountTypes = $lineAmountTypes;
        return $this;
    }

    /**
     * @return array
     */
    public function getLineItems()
    {
        return $this->lineItems;
    }

    /**
     * @param array $lineItems
     * @return $this
     */
    public function setLineItems($lineItems)
    {
        $this->lineItems = $lineItems;

        return $this;
    }

    /**
     * @param LineItem $lineItem
     * @return $this
     */
    public function addLineItem(LineItem $lineItem){
        $this->lineItems[] = $lineItem;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
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
        $invoiceArr = [
            "InvoiceNumber"     => $this->getInvoiceNumber(),
            "Type"              => $this->getType(),
            "Contact"           => $this->getContact()->toArray(),
            "Date"              => $this->getDate()->format("Y-m-d"),
            "DueDate"           => $this->getDueDate()->format("Y-m-d"),
            "LineAmountTypes"   => $this->getLineAmountTypes(),
            "Status"            => $this->getStatus()
        ];

        $invoiceArr['LineItems'] = [];
        foreach($this->getLineItems() as $item){
            /**
             * @var LineItem $item
             */
            $invoiceArr['LineItems'][] = [
                'LineItem' => $item->toArray()
            ];
        }
        return $invoiceArr;
    }
}
