<?php 
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Admin\AdminInterface;

class InvoiceRowAdmin extends AbstractAdmin
{
	
	protected $parentAssociationMapping = 'invoice';
	
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
        	->add('description', 'text')
        	->add('quantity', 'number')
        	->add('amount', 'number')
        	->add('vat', 'number')
        	->add('tot_amount', null, array('attr' => array('readonly' => 'readonly')))
        	->add('invoice', 'sonata_type_model_hidden', array('attr' => array('hidden' => true)))->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        
    }

    protected function configureListFields(ListMapper $listMapper)
    {
    	
    }
    
    protected function configureRoutes(RouteCollection $collection)
    {
    	if ($this->isChild()) {
    		$collection->clearExcept(['show', 'edit']);    
    		return;
    	}
    	$collection->clearExcept(['show', 'edit','create']); 
    
    }
    
    public function toString($object)
    {
    	return $object instanceof InvoiceRow
    	? $object->getDescription()
    	: 'Description';
    }
}
