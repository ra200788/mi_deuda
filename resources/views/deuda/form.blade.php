<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('adeudo') }}
            {{ Form::text('adeudo', $deuda->adeudo, ['class' => 'form-control' . ($errors->has('adeudo') ? ' is-invalid' : ''), 'placeholder' => 'Adeudo']) }}
            {!! $errors->first('adeudo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">


        <div class="form-group">
            {{ Form::label('fecha_adeudo') }}
            {{ Form::date('fecha_adeudo', $deuda->fecha_adeudo, ['class' => 'form-control' . ($errors->has('fecha_adeudo') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Adeudo']) }}
            {!! $errors->first('fecha_adeudo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cliente_id') }}
            {{ Form::select('cliente_id', $clientes, $deuda->cliente_id, ['class' => 'form-control' . ($errors->has('cliente_id') ? ' is-invalid' : ''), 'placeholder' => 'Cliente Id']) }}
            {!! $errors->first('cliente_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
