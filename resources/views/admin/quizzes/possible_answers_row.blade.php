<tr data-index="{{ $index }}">
    <td>{!! Form::text('possible_answers['.$index.'][text]', old('possible_answers['.$index.'][text]', isset($field) ? $field->text: ''), ['class' => 'form-control']) !!}</td>
<td>
    {!! Form::label('possible_answers['.$index.'][is_correct]', 'Ignore this field if it`s just an interview', ['class' => 'control-label']) !!}
    {!! Form::hidden('possible_answers['.$index.'][is_correct]', 0) !!}
    {!! Form::checkbox('possible_answers['.$index.'][is_correct]', 1, $field->is_correct ?? false, []) !!}
</td>
    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>