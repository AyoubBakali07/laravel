<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        // Affiche le formulaire de contact
        return view('contact');
    }

    public function store(Request $request)
    {
        // Valide les données du formulaire
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'messages' => 'required',
        ]);

        // Envoie l'email avec la méthode 'view' et en s'assurant que la vue reçoit bien les données
        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->to('ayoubbakali817@gmail.com', 'Destinataire')
                    ->subject('Nouveau message de contact');
        });


        // Redirige vers la page d'accueil avec un message de succès
        return redirect('/')->with('success', 'Votre message a bien été envoyé.');
    }
}