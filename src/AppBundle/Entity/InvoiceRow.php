<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InvoiceRow
 * @ORM\Entity @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="invoice_row")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InvoiceRowRepository")
 */
class InvoiceRow
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
     * @var Invoice
     * @ORM\ManyToOne(targetEntity="Invoice", inversedBy="invoiceRows")
     */
    private $invoice;
    
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;
    
    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;
    
    /**
     * @var float
     *
     * @ORM\Column(name="amount", type="decimal", precision=12, scale=2)
     */
    private $amount;
    
    /**
     * @var float
     *
     * @ORM\Column(name="vat", type="decimal", precision=12, scale=2)
     */
    private $vat;
    
    /**
     * @var float
     *
     * @ORM\Column(name="tot_amount", type="decimal", precision=12, scale=2)
     */
    private $tot_amount;


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
     * Get invoice
     *
     * @return \Invoice
     */
    public function getInvoice()
    {
    	return $this->invoice;
    }
    

    /**
     * Set invoice
     *
     */
    public function setInvoice(Invoice $invoice)
    {
    	$this->invoice = $invoice;
    }
    
    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
    	return $this->description;
    }
    
    /**
     * Set description
     *
     */
    public function setDescription(string $description)
    {
    	$this->description = $description;
    }
    
    /**
     * Get quantity
     *
     * @return int
     */
    public function getQuantity()
    {
    	return $this->quantity;
    }
    
    /**
     * Set quantity
     *
     */
    public function setQuantity(int $quantity)
    {
    	$this->quantity = $quantity;
    }
    
    
    /**
     * Get amount
     *
     * @return float
     */
    public function getAmount()
    {
    	return $this->amount;
    }
    
    /**
     * Set amount
     *
     */
    public function setAmount(float $amount)
    {
    	$this->amount = $amount;
    }
    
    
    /**
     * Get vat
     *
     * @return float
     */
    public function getVat()
    {
    	return $this->vat;
    }
    
    /**
     * Set vat
     *
     */
    public function setVat(float $vat)
    {
    	$this->vat = $vat;
    }
    
    /**
     * Get tot amount
     *
     * @return float
     */
    public function getTotAmount()
    {
    	return $this->tot_amount;
    }
    
    /**
     * Set tot amount
     *
     */
    public function setTotAmount($tot_amount)
    {
    	$this->tot_amount = $tot_amount;
    }
    
    
    public function calculateTotAmount()
    {
    	$this->tot_amount = $this->amount + $this->vat;
    }
    
    /** @ORM\PreUpdate */
    public function doStuffOnPreUpdate()
    {
    	$this->calculateTotAmount();
    }
    
    /** @ORM\PrePersist */
    public function doStuffOnPrePersist()
    {
    	$this->calculateTotAmount();
    }
}

