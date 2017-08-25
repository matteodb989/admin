<?php 
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class InvoiceAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
        ->with('Invoice')
        	->add('date', 'date')
        	->add('number', 'number', array('required' => true), array('edit' => 'inline') )
        	->add('client_id', 'number', array('required' => true), array('edit' => 'inline') )->end();
        
        $formMapper->with('Invoice Rows')
            ->add('invoiceRows', 'sonata_type_collection', 
            		array(
						'required' => false,
						'by_reference' => true
            		),
                    array('edit' => 'inline', 'inline' => 'table')
            	)->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        //$datagridMapper->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
        	->addIdentifier('number')
        	->addIdentifier('date')
        	->addIdentifier('client_id');
    }
    
}
