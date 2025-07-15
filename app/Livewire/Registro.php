<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Registro as Reg;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Illuminate\Database\QueryException;

class Registro extends Component
{
    use WithFileUploads;

    public $email;
    public $a_pat;
    public $a_mat;
    public $nombre;
    public $inst;
    public $cargo;
    public $e_fed;
    public $c_elec;
    public $ine; // archivo
    public $pasap; // opcional
    public $c_curp; // texto
    public $curp; // archivo
    public $email_comp;
    public $tel;
    public $ext;
    public $cel;

    protected $rules = [
        'email' => ['required', 'email', 'unique:registros,email'],
        'a_pat'       => 'required|string|max:255',
        'a_mat'       => 'required|string|max:255',
        'nombre'      => 'required|string|max:255',
        'inst'        => 'required|string|max:255',
        'cargo'       => 'required|string|max:255',
        'e_fed'       => 'required|string|max:255',
        'c_elec'     => ['required', 'string', 'regex:/[BCDFGHJKLMNPQRSTVWXYZ]{6}[0-9]{2}[0-1]{1}[0-9]{1}[0-3]{1}[0-9]{1}[0-3]{1}[0-9]{1}[HM]{1}[0-9]{3}/'],
        'ine'         => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'pasap'       => 'nullable|string|max:255',
        'c_curp'     => ['required', 'string', 'regex:/^[A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|BC|BS|CC|CL|CM|CS|CH|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d]\d$/'],
        'curp'        => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'email_comp'  => 'required|email|max:255',
        'tel'         => 'required|string|max:20',
        'ext'         => 'required|string|max:10',
        'cel'         => 'required|string|max:20',
    ];

    protected $messages = [
        'email.required'      => 'El correo es obligatorio.',
        'email.email'         => 'El correo debe ser válido.',
        'email.unique'        => 'El correo ya está registrado.',

        'a_pat.required'      => 'El apellido paterno es obligatorio.',
        'a_pat.string'        => 'El apellido paterno debe ser texto.',
        'a_mat.required'      => 'El apellido materno es obligatorio.',
        'a_mat.string'        => 'El apellido materno debe ser texto.',

        'nombre.required'     => 'El nombre es obligatorio.',
        'nombre.string'       => 'El nombre debe ser texto.',

        'inst.required'       => 'La institución es obligatoria.',
        'inst.string'         => 'La institución debe ser texto.',

        'cargo.required'      => 'El cargo es obligatorio.',
        'cargo.string'        => 'El cargo debe ser texto.',

        'e_fed.required'      => 'La entidad federativa es obligatoria.',
        'e_fed.string'        => 'La entidad federativa debe ser texto.',

        'c_elec.required'     => 'La clave de elector es obligatoria.',
        'c_elec.regex'    => 'La clave de elector debe tener el formato válido (6 letras y 8 dígitos).',

        'ine.required'        => 'Debe adjuntar la foto de su INE.',
        'ine.file'            => 'El archivo del INE no es válido.',
        'ine.mimes'           => 'La foto del INE debe ser JPG, PNG o PDF.',
        'ine.max'             => 'La foto del INE no debe superar 2 MB.',

        'pasap.string'        => 'El pasaporte debe ser texto.',

        'c_curp.required'     => 'El CURP es obligatorio.',
        'c_curp.string'       => 'El CURP debe ser texto.',
        'c_curp.regex'    => 'El CURP debe tener el formato válido (18 caracteres: letras y números).',

        'curp.required'       => 'Debe adjuntar la foto de su CURP.',
        'curp.file'           => 'El archivo de CURP no es válido.',
        'curp.mimes'          => 'La foto del CURP debe ser JPG, PNG o PDF.',
        'curp.max'            => 'La foto del CURP no debe superar 2 MB.',

        'email_comp.required' => 'El correo complementario es obligatorio.',
        'email_comp.email'    => 'El correo complementario debe ser válido.',

        'tel.required'        => 'El teléfono fijo es obligatorio.',
        'tel.string'          => 'El teléfono fijo debe ser texto.',

        'ext.required'        => 'La extensión es obligatoria.',
        'ext.string'          => 'La extensión debe ser texto.',

        'cel.required'        => 'El número de celular es obligatorio.',
        'cel.string'          => 'El número de celular debe ser texto.',
    ];

    public function register()
    {
        $this->c_elec = strtoupper($this->c_elec);
        $this->c_curp = strtoupper($this->c_curp);
        $this->validate();

        try {
            // Guarda archivos
            $inePath = $this->ine->store('documentos/ine', 'public');
            $curpPath = $this->curp->store('documentos/curp', 'public');

            // Crea registro
            $registro = Reg::create([
                'email'      => $this->email,
                'a_pat'      => $this->a_pat,
                'a_mat'      => $this->a_mat,
                'nombre'     => $this->nombre,
                'inst'       => $this->inst,
                'cargo'      => $this->cargo,
                'e_fed'      => $this->e_fed,
                'c_elec'     => $this->c_elec,
                'ine'        => $inePath,
                'pasap'      => $this->pasap ?? null,  // pasap es opcional
                'c_curp'     => $this->c_curp,
                'curp'       => $curpPath,
                'email_comp' => $this->email_comp,
                'tel'        => $this->tel,
                'ext'        => $this->ext,
                'cel'        => $this->cel,
            ]);

            // Genera PDF con datos del registro
            $pdf = Pdf::loadView('registro.pdf', compact('registro'));

            $fileName = 'documentos/comp/registro_' . $registro->id . '.pdf';
            Storage::disk('public')->put($fileName, $pdf->output());

            // Actualiza campo comp con la ruta PDF
            $registro->update(['comp' => $fileName]);

            // Redirige a página de confirmación
            return redirect()->route('registro.confirmacion', $registro);
        } catch (QueryException $e) {
            // Detectar si es error por correo duplicado (código SQLSTATE 23000)
            if ($e->getCode() === '23000') {
                // Agregar error manual para email
                $this->addError('email', 'El correo electrónico ya está registrado.');
                return;  // No redirige, solo muestra error en formulario
            }

            // Si otro error, lanzar para debug
            throw $e;
        }
    }

    public function render()
    {
        return view('livewire.registro');
    }

    public function updatedEmail()
    {
        $this->resetErrorBag('email');
    }
}
