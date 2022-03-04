<?php

namespace App\Controllers;

use App\Models\ContactModel;
use App\Models\OrganisationModel;
use App\Models\LoginModel;
use CodeIgniter\Controller;

class Recherche extends Controller {

    public function __construct() {
        $this->db = \Config\Database::connect();
        $this->ContactModel = $this->db->table('contact');
    }

    public function index() {
        helper(['Contact', 'url']);
        
        echo view('template/header');
        echo view('Recherche/AccueilRecherche');
        echo view('template/footer');
    }

    public function aide_contact() {
        echo view('Recherche/information');
    }

    //
    //FONCTION TRAITANT DES CONTACTS
    // 

    public function tout_les_contacts() {
        $model = new ContactModel();
        $model1 = new OrganisationModel();
        $data = [
            'contacts' => $model->getContact(),
            'organisations' => $model1->getOrganisation(),
        ];
        echo view('Recherche/Contact/ListeContact', $data);
    }

    public function modifier_contact($ID_Contact = null) {
        $contact = new ContactModel();
        $data['contact'] = $contact->find($ID_Contact);

        return view('Modifier/ModificationContact', $data);
    }

    public function update_contact($ID_Contact = null) {
        $contact = new ContactModel();
        $data = [
            'Nom_Contact' => $this->request->getPost('Nom_Contact'),
            'Prenom_Contact' => $this->request->getPost('Prenom_Contact'),
            'numeroTel_Contact' => $this->request->getPost('numeroTel_Contact'),
            'mail_Contact' => $this->request->getPost('mail_Contact'),
            'ID_Organisation' => $this->request->getPost('ID_Organisation'),
            'Nom_Organisation_Contact' => $this->request->getPost('Nom_Organisation_Contact'),
        ];
        $contact->update($ID_Contact, $data);

        return redirect()->to(base_url('Recherche/tout_les_contacts'))->with('status', 'Modification effectué');
    }

    public function delete_contact($ID_Contact) {
        $con = new ContactModel();
        $con->delete($ID_Contact);

        return redirect()->to(base_url('Recherche/tout_les_contacts'))->with('status', 'Suppression effectué');
    }

    //
    // FONCTION TRAITANT DES ORGANISATIONS
    //

    public function toute_les_organisations() {
        $model = new OrganisationModel();
        $data = [
            'organisations' => $model->getOrganisation()
        ];
        echo view('Recherche/Organisation/ListeOrganisation', $data);
    }

    public function modifier_organisation($ID_Organisation = null) {
        $organisation = new OrganisationModel();
        $data['organisation'] = $organisation->find($ID_Organisation);

        return view('Modifier/ModificationOrganisation', $data);
    }

    public function update_organisation($ID_Organisation = null) {
        $organisation = new OrganisationModel();
        $data = [
            'Nom_Organisation' => $this->request->getPost('Nom_Organisation'),
            'Adresse_Organisation' => $this->request->getPost('Adresse_Organisation'),
            'Mail_Organisation' => $this->request->getPost('Mail_Organisation'),
            'Site_Organisation' => $this->request->getPost('Site_Organisation'),
            'Telephone_Organisation' => $this->request->getPost('Telephone_Organisation'),
        ];
        $organisation->update($ID_Organisation, $data);
        return redirect()->to(base_url('Recherche/toute_les_organisations'))->with('status', 'Modification effectué');
    }

    public function delete_organisation($ID_Organisation) {
        $org = new OrganisationModel();
        $org->delete($ID_Organisation);

        return redirect()->to(base_url('Recherche/toute_les_organisations'));
    }

    //
    //FONCTION TRAITANT DES LOGINS
    //

    public function tout_les_login() {
        $model = new LoginModel();
        $data = [
            'logins' => $model->getLogin(),
        ];
        echo view('Recherche/Login/ListeLogin', $data);
    }

    public function modifier_login($ID_Login = null) {
        $login = new LoginModel();
        $data['login'] = $login->find($ID_Login);

        return view('Modifier/ModificationLogin', $data);
    }

    public function update_login($ID_Login = null) {
        $login = new LoginModel();
        $data = [
            'Utilisateur_Login' => $this->request->getPost('Utilisateur_Login'),
            'Password_Login' => $this->request->getPost('Password_Login'),
        ];
        $login->update($ID_Login, $data);
        return redirect()->to(base_url('Recherche/tout_les_login'))->with('status', 'Modification effectué');
    }

    public function delete_login($ID_Login) {
        $log = new LoginModel();
        $log->delete($ID_Login);

        return redirect()->to(base_url('Recherche/tout_les_login'));
    }

}
