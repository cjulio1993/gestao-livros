<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leitores extends Model
{
    protected $table = 'leitores';
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $fillable = [
        'nOme',
        'email',
        'cpf',
        'rg',
        'data_nascimento',
        'telefone',
        'endereco',
        'numero_carteirinha',
    ];

    protected $casts = [
        'data_nascimento' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // public function emprestimos()
    // {
    //     return $this->hasMany(Emprestimos::class, 'leitor_id', 'id');
    // }

    public static function isValidCPF(string $cpf): bool
    {
        $cpf = preg_replace('/\D/', '', $cpf);

        if (strlen($cpf) !== 11 || preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            $sum = 0;
            for ($i = 0; $i < $t; $i++) {
                $sum += (int)$cpf[$i] * (($t + 1) - $i);
            }
            $digit = ((10 * $sum) % 11) % 10;
            if ((int)$cpf[$t] !== $digit) {
                return false;
            }
        }

        return true;
    }
}
