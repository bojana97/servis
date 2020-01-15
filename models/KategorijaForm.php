<?php
/*
namespace app\models;
use Yii;

class KategorijaForm extends Kategorija
{


	public $atributi=[];

	 /**
     * @var array|null list of old Atributi (as loaded from DB)
     * This is `null` if the record [[isNewRecord|is new]].
     
	private $_oldAtributi;

	public function save($runValidation = true, $attributeNames = null)
	{
        $transaction = Yii::$app->db->beginTransaction();
        try {
            if (!parent::save($runValidation, $attributeNames)) {
                return false;
            }
            $this->addNewAtributi();

            $this->deleteOldAtributi();

            $transaction->commit();

        } catch (\Exception $e) {
            $transaction->rollBack();
            throw $e;
        }

        return true;

    }



	/**
     * Create new AtributiKategorije records that are not included in the old list of Atributi
     * 
     * @throws Exception update failed
    


	protected function addNewAtributi()

    {

        $newAtributi = [];


        if ($this->isNewRecord) {

            $newAtributi = $this->atributi;

        } else {

            // Check which Atributi are new (not included in $this->_oldAtributi)

            foreach ($this->atributi as $atributID) {

                if (!in_array($atributID, $this->_oldAtributi)) {

                    $newAtributi[] = $atributID;

                }

            }

        }


        // Add new records

        foreach ($newAtributi as $atributID) {

            $atributKategorije = new AtributiKategorije();

            $atributKategorije->katID = $this->katID;

            $atributKategorije->atrID = $atributID;

            if (!$atributKategorije->save()) {

                throw new Exception('Failed to save related records.');

            }

        }

    }





	/**
     * Deletes related BookAuthor records that are not included in the current list of Authors
     * 
     * @throws Exception update failed
    

    protected function deleteOldAtributi()
    {

        foreach ($this->atributiKategorijes as $atributKategorije) {

            if (!in_array($atributKategorije->atrID, $this->atributi) && $atributKategorije->delete() === false) {

                throw new Exception('Failed to save related records.');

            }

        }

    }


    /**

     * Overrides parent method. 

     * Populates authors property with IDs of related records and makes a copy

     * to the internal _oldAuthors property.

     

    public function afterFind()

    {

        foreach ($this->atributiKategorijes as $atributKategorije) {

            $this->atributi[] = $atributKategorije->atrID;

        }


        $this->_oldAtributi = $this->atributi;

        

        parent::afterFind();

    }






}

