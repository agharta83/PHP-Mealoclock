<?php

namespace MealOclock\Controllers\Admin;

class MemberController extends CoreController {

    // Affiche la liste des membres
    public function list() {
        // On récupére la liste des membres
        $list = \MealOclock\Models\MemberModel::findAll();
        // On affiche la template
        echo $this->templates->render('admin/member/list', ['members' => $list]);
    }

    // Supprime un membre
    public function delete ($params) {
        // On récupére l'identifiant du membrer à supprimer
        $id = $params['id'];
        // On supprime le membre
        $member = \MealOclock\Models\MemberModel::find($id);
        if ($member) $member->delete();
        // On redirige l'utilisateur
        $this->redirect('admin_members');
    }
}