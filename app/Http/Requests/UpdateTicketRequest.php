<?php

namespace App\Http\Requests;

use App\Models\Ticket;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $ticket = $this->route('ticket');
        $user = $this->user();

        if (! $ticket instanceof Ticket || $user === null) {
            return false;
        }

        return $user->can('update', $ticket);
    }

    /**
     * Prepare data before validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'title' => is_string($this->title) ? trim($this->title) : null,
            'description' => is_string($this->description) ? trim($this->description) : null,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        $rules = [
            'title' => ['required', 'string', 'min:5', 'max:255'],
            'description' => ['required', 'string', 'min:20'],
            'priority' => ['required', 'in:low,medium,high'],
            'category' => ['nullable', 'string', 'max:100'],
        ];

        $user = $this->user();
        if ($user !== null && $user->hasAnyRole(['admin', 'staff'])) {
            $rules['status'] = ['sometimes', 'in:open,in_progress,resolved,closed'];
        }

        return $rules;
    }

    /**
     * Get custom error messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Judul tiket wajib diisi.',
            'title.string' => 'Judul harus berupa teks.',
            'title.min' => 'Judul minimal :min karakter.',
            'title.max' => 'Judul maksimal :max karakter.',
            'description.required' => 'Deskripsi tiket wajib diisi.',
            'description.string' => 'Deskripsi harus berupa teks.',
            'description.min' => 'Deskripsi minimal :min karakter agar permasalahan jelas.',
            'status.required' => 'Status tiket wajib dipilih.',
            'status.in' => 'Status tidak valid. Pilih: Open, In Progress, Resolved, atau Closed.',
            'priority.required' => 'Prioritas tiket wajib dipilih.',
            'priority.in' => 'Prioritas tidak valid. Pilih: Low, Medium, atau High.',
            'category.string' => 'Kategori harus berupa teks.',
            'category.max' => 'Kategori maksimal :max karakter.',
        ];
    }

    /**
     * Get custom attribute names.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'title' => 'judul tiket',
            'description' => 'deskripsi',
            'status' => 'status',
            'priority' => 'prioritas',
            'category' => 'kategori',
        ];
    }

    /**
     * Sanitize validated payload.
     */
    protected function passedValidation(): void
    {
        $this->merge([
            'description' => strip_tags((string) $this->input('description')),
        ]);
    }
}
