<?php

use yii\db\Migration;

/**
 * Class m191105_215315_create_rbac_tables
 */
class m191105_215315_create_rbac_tables extends Migration{

    public function safeUp(){

	$auth = Yii::$app->authManager;

	//dodajemo pravilo
	$kreator = new app\rbac\KreatorPravilo;
	$auth->add($kreator);



	//permisije za naloge
	$kreiranjeNaloga = $auth->createPermission('kreiranjeNaloga');
    $kreiranjeNaloga->description = 'Kreiranje novog naloga.';
    $auth->add($kreiranjeNaloga);

	$izmjenaNaloga = $auth->createPermission('izmjenaNaloga');
	$izmjenaNaloga->description = 'Izmjena postojeceg naloga.';
	$auth->add($izmjenaNaloga);

	//dodajemo pravilo permisiji za izmjenu sopstvenog naloga
	$izmjenaSvogNaloga = $auth->createPermission('izmjenaSvogNaloga');
	$izmjenaSvogNaloga->description = 'Izmjena samo svog naloga.';
	$izmjenaSvogNaloga->ruleName = $kreator->name;
	$auth->add($izmjenaSvogNaloga);
	//kreiranje hijerarhije medju permisijama, PARENT,CHILD
	$auth->addChild($izmjenaSvogNaloga, $izmjenaNaloga);






	$brisanjeNaloga = $auth->createPermission('brisanjeNaloga');
	$brisanjeNaloga->description = 'Brisanje postojeceg naloga.';
	$auth->add($brisanjeNaloga);

	//dodajemo pravilo permisiji za brisanje sopstvenog naloga
	$brisanjeSvogNaloga = $auth->createPermission('brisanjeSvogNaloga');
	$brisanjeSvogNaloga->description = 'Brisanje svog naloga.';
	$brisanjeSvogNaloga->ruleName = $kreator->name;
	$auth->add($brisanjeSvogNaloga);
	$auth->addChild($brisanjeSvogNaloga, $brisanjeNaloga);




	$pregledajNaloge = $auth->createPermission('pregledajNaloge');
	$pregledajNaloge->description = 'Pregled svih naloga.';
	$auth->add($pregledajNaloge);

	$pregledajNalog= $auth->createPermission('pregledajNalog');
	$pregledajNalog->description = 'Detaljni pregled jednog naloga.';
	$auth->add($pregledajNalog);



	//permisije za korisnike
	$kreiranjeKorisnika = $auth->createPermission('kreiranjeKorisnika');
    $kreiranjeKorisnika->description = 'Unos novog korisnika.';
    $auth->add($kreiranjeKorisnika);

	$izmjenaKorisnika = $auth->createPermission('izmijenaKorisnika');
	$izmjenaKorisnika->description = 'Izmjena korisnika.';
	$auth->add($izmjenaKorisnika);

	$brisanjeKorisnika = $auth->createPermission('brisanjeKorisnika');
	$brisanjeKorisnika->description = 'Brisanje korisnika.';
	$auth->add($brisanjeKorisnika);

	$pregledajKorisnike= $auth->createPermission('pregledajKorisnike');
	$pregledajKorisnike->description = 'Pregled svih korisnika.';
	$auth->add($pregledajKorisnike);

	$pregledajKorisnika= $auth->createPermission('pregledajKorisnika');
	$pregledajKorisnika->description = 'Pregled samo jednog korisnika.';
	$auth->add($pregledajKorisnika);


	//permisije za osnovna sredstva
	$kreiranjeSredstva = $auth->createPermission('kreiranjeSredstva');
    $kreiranjeSredstva->description = 'Unos novog osnovnog sredstva.';
    $auth->add($kreiranjeSredstva);

	$izmjenaSredstva = $auth->createPermission('izmjenaSredstva');
	$izmjenaSredstva->description = 'Izmjena osnovnog sredstva.';
	$auth->add($izmjenaSredstva);

	$brisanjeSredstva = $auth->createPermission('brisanjeSredstva');
	$brisanjeSredstva->description = 'Brisanje osnovnog sredstva.';
	$auth->add($brisanjeSredstva);

	$pregledajSredstva = $auth->createPermission('pregledajSredstva');
	$pregledajSredstva->description = 'Pregled svih osnovnih sredstava.';
	$auth->add($pregledajSredstva);

	$pregledajSredstvo = $auth->createPermission('pregledajSredstvo');
	$pregledajSredstvo->description = 'Pregled jednog osnovnog sredstva.';
	$auth->add($pregledajSredstvo);



	//permisije za kategorije
	$kreiranjeKategorije = $auth->createPermission('kreiranjeKategorije');
    $kreiranjeKategorije->description = 'Unos nove kategorije.';
    $auth->add($kreiranjeKategorije);

	$izmjenaKategorije = $auth->createPermission('izmjenaKategorije');
	$izmjenaKategorije->description = 'Izmjena postojece kategorije.';
	$auth->add($izmjenaKategorije);

	$brisanjeKategorije = $auth->createPermission('brisanjeKategorije');
	$brisanjeKategorije->description = 'Brisanje postojece kategorije.';
	$auth->add($brisanjeKategorije);

	$pregledajKategorije = $auth->createPermission('pregledajKategorije');
	$pregledajKategorije->description = 'Pregled svih kategorija.';
	$auth->add($pregledajKategorije);
	
	$pregledajKategoriju = $auth->createPermission('pregledajKategoriju');
	$pregledajKategoriju->description = 'Pregled jedne kategorije.';
	$auth->add($pregledajKategoriju);


	//permisije za sektore
	$kreiranjeSektora = $auth->createPermission('kreiranjeSektora');
    $kreiranjeSektora->description = 'Kreiranje novog sektora.';
    $auth->add($kreiranjeSektora);

	$izmjenaSektora = $auth->createPermission('izmjenaSektora');
	$izmjenaSektora->description = 'Izmjena postojeceg sektora.';
	$auth->add($izmjenaSektora);

	$brisanjeSektora = $auth->createPermission('brisanjeSektora');
	$brisanjeSektora->description = 'Brisanje postojeceg sektora.';
	$auth->add($brisanjeSektora);

	$pregledajSektore = $auth->createPermission('pregledajSektore');
	$pregledajSektore->description = 'Pregled svih sektora.';
	$auth->add($pregledajSektore);

	$pregledajSektor = $auth->createPermission('pregledajSektor');
	$pregledajSektor->description = 'Pregled svih sektora.';
	$auth->add($pregledajSektor);

	//dodati pravilo na permisiju
	//kreirati rolu
	//dodijeliti permisije roli
	//dodjeliti rolu korisnciku

	//permisije za atribute
	$kreiranjeAtributa = $auth->createPermission('kreiranjeAtributa');
    $kreiranjeAtributa->description = 'Kreiranje novog atributa,karakteristike.';
    $auth->add($kreiranjeAtributa);

	$izmjenaAtributa = $auth->createPermission('izmjenaAtributa');
	$izmjenaAtributa->description = 'Izmjena postojeceg atrbuta.';
	$auth->add($izmjenaAtributa);

	$brisanjeAtributa = $auth->createPermission('brisanjeAtributa');
	$brisanjeAtributa->description = 'Brisanje postojeceg atributa.';
	$auth->add($brisanjeAtributa);

	$pregledajAtribute= $auth->createPermission('pregledajAtribute');
	$pregledajAtribute->description = 'Pregled svih atributa.';
	$auth->add($pregledajAtribute);


	//permisije za vrijednosti
	$kreiranjeVrijednosti = $auth->createPermission('kreiranjeVrijednosti');
    $kreiranjeVrijednosti->description = 'Kreiranje nove vrijednosti atributa.';
    $auth->add($kreiranjeVrijednosti);

	$izmjenaVrijednosti = $auth->createPermission('izmjenaVrijednosti');
	$izmjenaVrijednosti->description = 'Izmjena vrijednosti.';
	$auth->add($izmjenaVrijednosti);

	$brisanjeVrijednosti = $auth->createPermission('brisanjeVrijednosti');
	$brisanjeVrijednosti->description = 'Brisanje vrijednosti.';
	$auth->add($brisanjeVrijednosti);

	$pregledajVrijednosti= $auth->createPermission('pregledajVrijednosti');
	$pregledajVrijednosti->description = 'Pregled svih vrijednosti.';
	$auth->add($pregledajVrijednosti);



	//permisije za vrijednosti atributa osnovnog sredstva
	$kreiranjeVrijednostiOs = $auth->createPermission('kreiranjeVrijednostiOs');
    $kreiranjeVrijednostiOs->description = 'Povezivanje vrijednosti atributa sa osnovnm sredstvom.';
    $auth->add($kreiranjeVrijednostiOs);

	$izmjenaVrijednostiOs = $auth->createPermission('izmjenaVrijednostiOs');
	$izmjenaVrijednostiOs->description = 'Izmjena vrijednosti ili sredstva koji su povezani.';
	$auth->add($izmjenaVrijednostiOs);

	$brisanjeVrijednostiOs = $auth->createPermission('brisanjeVrijednostiOs');
	$brisanjeVrijednostiOs->description = 'Brisanje rekorda vrijednost_os.';
	$auth->add($brisanjeVrijednostiOs);

	$pregledajVrijednostiOs= $auth->createPermission('pregledajVrijednostiOs');
	$pregledajVrijednostiOs->description = 'Pregled povezanih vrijednosti atributa sa osnovnim sredstvom.';
	$auth->add($pregledajVrijednostiOs);


	//permisije ATRIBUTI KATEGORIJA
	$kreiranjeAtributaKategorija = $auth->createPermission('kreiranjeAtributaKategorija');
    $kreiranjeAtributaKategorija->description = 'Povezivanje atributa sa kategorijom.';
    $auth->add($kreiranjeAtributaKategorija);

	$izmjenaAtributaKategorija = $auth->createPermission('izmjenaAtributaKategorija');
	$izmjenaAtributaKategorija->description = 'Izmjena atributa i kategorija koji su povezani.';
	$auth->add($izmjenaAtributaKategorija);

	$brisanjeAtributaKategorija = $auth->createPermission('brisanjeAtributaKategorija');
	$brisanjeAtributaKategorija->description = 'Brisanje rekorda atributi kategorije.';
	$auth->add($brisanjeAtributaKategorija);

	$pregledajAtributeKategorija = $auth->createPermission('pregledajAtributeKategorija');
	$pregledajAtributeKategorija->description = 'Pregled povezanih  atributa sa kategorijama.';
	$auth->add($pregledajAtributeKategorija);


	//rola korisnik
	$korisnik = $auth->createRole('korisnik');
	$auth->add($korisnik);
	$auth->addChild($korisnik, $kreiranjeNaloga);
	$auth->addChild($korisnik, $izmjenaSvogNaloga);
	$auth->addChild($korisnik, $brisanjeSvogNaloga);

	//rola serviser
	$serviser = $auth->createRole('serviser');
	$auth->add($serviser);
	$auth->addChild($serviser, $korisnik);

	$auth->addChild($serviser, $kreiranjeNaloga);
	$auth->addChild($serviser, $izmjenaNaloga);
	$auth->addChild($serviser, $brisanjeSvogNaloga);
	$auth->addChild($serviser, $pregledajSredstva);
	$auth->addChild($serviser, $pregledajSredstvo);
	$auth->addChild($serviser, $pregledajKorisnike);


	//rola administrator

	$administrator = $auth->createRole('administrator');
	$auth->add($administrator);
	$auth->addChild($administrator, $serviser);

	$auth->addChild($administrator, $kreiranjeNaloga);
	$auth->addChild($administrator, $izmjenaNaloga);
	$auth->addChild($administrator, $brisanjeNaloga);
	$auth->addChild($administrator, $pregledajNaloge);
	$auth->addChild($administrator, $pregledajNalog);

	$auth->addChild($administrator, $kreiranjeKorisnika);
	$auth->addChild($administrator, $izmjenaKorisnika);
	$auth->addChild($administrator, $brisanjeKorisnika);
	$auth->addChild($administrator, $pregledajKorisnike);
	$auth->addChild($administrator, $pregledajKorisnika);

	$auth->addChild($administrator, $kreiranjeKategorije);
	$auth->addChild($administrator, $izmjenaKategorije);
	$auth->addChild($administrator, $brisanjeKategorije);
	$auth->addChild($administrator, $pregledajKategorije);
	$auth->addChild($administrator, $pregledajKategoriju);

	$auth->addChild($administrator, $kreiranjeSektora);
	$auth->addChild($administrator, $izmjenaSektora);
	$auth->addChild($administrator, $brisanjeSektora);
	$auth->addChild($administrator, $pregledajSektore);
	$auth->addChild($administrator, $pregledajSektor);

	$auth->addChild($administrator, $kreiranjeAtributa);
	$auth->addChild($administrator, $izmjenaAtributa);
	$auth->addChild($administrator, $brisanjeAtributa);
	$auth->addChild($administrator, $pregledajAtribute);

	$auth->addChild($administrator, $kreiranjeVrijednosti);
	$auth->addChild($administrator, $izmjenaVrijednosti);
	$auth->addChild($administrator, $brisanjeVrijednosti);
	$auth->addChild($administrator, $pregledajVrijednosti);

	$auth->addChild($administrator, $kreiranjeVrijednostiOs);
	$auth->addChild($administrator, $izmjenaVrijednostiOs);
	$auth->addChild($administrator, $brisanjeVrijednostiOs);
	$auth->addChild($administrator, $pregledajVrijednostiOs);

    }


    public function safeDown(){
        $auth = Yii::$app->authManager;
        $auth->removeAll();
    }

}
