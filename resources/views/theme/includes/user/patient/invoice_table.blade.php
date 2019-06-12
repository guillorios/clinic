<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Concepto</th>
            <th>Doctor</th>
            <th>Monto</th>
            <th>Estado</th>
            <th @if(isset($user)) colspan="2" @endif>Acción</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($invoices as $invoice)
            <tr>
                <td>{{ $invoice->id }}</td>
                <td>{{ $invoice->concept() }}</td>
                <td>{{ $invoice->doctor()->name }}</td>
                <td>{{ $invoice->amount }}</td>
                <td>{{ $invoice->status }}</td>
                <td><a href="#modal" data-invoice="{{ $invoice->id }}" onclick="modal_invoice(this)" class="modal-trigger">Ver</a></td>
                @if(isset($user))
                    <td><a href="{{ route('backoffice.patient.invoice.edit', [$user, $invoice]) }}">Editar</a></td>
                @endif
            </tr>
        @empty
            <tr>
                <td colspan="6">No tienes registrada ninguna factura</td>
            </tr>
        @endforelse
    </tbody>
</table>
