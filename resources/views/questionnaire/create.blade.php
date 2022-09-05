@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Questionnaire</div>

                    <div class="card-body">
                        <form action="/questionnaires" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="question">Title</label>
                                <input name="question[question]" type="text" class="form-control" id="question"
                                       aria-describedby="questionHelp" placeholder="Enter question">
                                <small id="questionHelp" class="form-text text-muted">Ask simple and to-the-point questions for the best results.</small>
                                @error('question.question')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <fieldset>
                                    <legend>Choises</legend>
                                    <small id="choicesHelp" class="form-text text-muted">Give choises that give you the most insight into your question.</small>
                                    <div>
                                        <div class="form-group">
                                            <label for="purpose">purpose</label>
                                            <input name="purpose" type="text" class="form-control" id="purpose"
                                                   aria-describedby="purposeHelp" placeholder="Enter purpose">
                                            <small id="purposeHelp" class="form-text text-muted">Ask simple and to-the-point purpose for the best results.</small>
                                            @error('purpose')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </fieldset>

                            </div>

                            <button type="submit" class="btn btn-primary">Save Questionnaire</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
