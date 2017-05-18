<tr data-index="{{ $index }}">
    <td>{!! Form::text('interview_answers['.$index.'][text]', old('interview_answers['.$index.'][text]', isset($field) ? $field->text: ''), ['class' => 'form-control']) !!}</td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>