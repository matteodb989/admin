<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Invoice
 *
 * @ORM\Table(name="invoice")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InvoiceRepository")
 */
class Invoice
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;
    
    /**
     * @var int
     *
     * @ORM\Column(name="number", type="integer")
     */
    private $number;
    
    /**
     * @var int
     *
     * @ORM\Column(name="client_id", type="integer")
     */
    private $client_id;
    
    /**
     * @ORM\OneToMany(targetEntity="InvoiceRow", mappedBy="invoice", cascade={"all"})
     */
    private $invoiceRows;

    
    public function __construct()
    {
    	$this->invoiceRows = new ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
    	return $this->date;
    }
    
    /**
     * Set date
     *
     */
    public function setDate(\DateTime $date)
    {
    	$this->date = $date;
    }
    
    /**
     * Get number
     *
     * @return int
     */
    public function getNumber()
    {
    	return $this->number;
    }
    
    /**
     * Set number
     *
     */
    public function setNumber(int $number)
    {
    	$this->number = $number;
    }
    
    /**
     * Get client Id
     *
     * @return int
     */
    public function getClientId()
    {
    	return $this->client_id;
    }
    
    /**
     * Set client Id
     *
     */
    public function setClientId(int $client_id)
    {
    	$this->client_id = $client_id;
    }
    
    /**
     * Get Invoice Rows
     *
     * @return ArrayCollection
     */
    public function getInvoiceRows()
    {
    	return $this->invoiceRows;
    }
    
    /**
     * Set Invoice Rows
     *
     */
    public function setInvoiceRows( $invoiceRows )
    {
    	$this->invoiceRows = $invoiceRows;
    }
    
    /**
     * Add Invoice Rows
     *
     */
    public function addInvoiceRow( InvoiceRow $invoiceRow )
    {
    	$this->invoiceRows->add( $invoiceRow );
    }
    
}

