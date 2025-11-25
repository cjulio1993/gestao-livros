<?php

namespace App\Http\Controllers;

use App\Models\Leitores;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UsersController extends Controller
{
    public function index()
    {
        $leitores = Leitores::paginate(10);
        return view('leitores.index', compact('leitores'));
    }

    public function show($id)
    {
        $leitor = Leitores::find($id);
        return view('leitores.show', compact('leitor'));
    }

    public function create()
    {
        return view('leitores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string', 'max:14', 'unique:leitores', 'custom_cpf'],
            'rg' => ['required', 'string', 'max:12', 'unique:leitores'],
            'data_nascimento' => ['required', 'date'],
            'telefone' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:leitores'],
            'endereco' => ['required', 'string', 'max:255'],
        ], [
            'cpf.custom_cpf' => 'CPF inválido.',
        ]);

        if (!Leitores::isValidCPF($request->cpf)) {
            return back()->withErrors(['cpf' => 'CPF inválido.'])->withInput();
        }

        // criar automaticamente um numero de carteirinha único com 7 digitos numericos
        do {
            $numero_carteirinha = str_pad(random_int(0, 9999999), 7, '0', STR_PAD_LEFT);
        } while (Leitores::where('numero_carteirinha', $numero_carteirinha)->exists());

        Leitores::create([
            'name' => $request->name,
            'email' => $request->email,
            'cpf' => preg_replace('/\D/', '', $request->cpf),
            'rg' => preg_replace('/\D/', '', $request->rg),
            'data_nascimento' => $request->data_nascimento,
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
            'numero_carteirinha' => $numero_carteirinha,
        ]);

        return redirect()->route('leitores.index')->with('success', 'Usuário criado com sucesso!');
    }

    public function edit($id)
    {
        $leitor = Leitores::find($id);
        return view('leitores.edit', compact('leitor'));
    }

    public function update(Request $request, $id)
    {
        $leitor = Leitores::find($id);

        if (!$leitor) {
            return redirect()->route('leitores.index')->with('error', 'Leitor não encontrado.');
        }

        $leitor->update([
            'email' => $request->email,
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
        ]);

        return redirect()->route('leitores.index')->with('success', 'Leitor atualizado com sucesso!');
    }

    public function destroy(Leitores $leitor)
    {
        $leitor->delete();
        return redirect()->route('leitores.index')->with('success', 'Leitor excluído com sucesso!');
    }
}
