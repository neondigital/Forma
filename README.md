Forma
=====

A nice way to play with forms in Laravel 4.


Examples
--------

```

Forma::open()->class('glenn')->class('bob')->attr('id','sweet');

Forma::text('first_name','glenn<$@£$T£!^;')->class('form-control')->attr('id','first_name');

Forma::text('last_name')->id('inputLast')->forceEmpty();

Forma::email('email')->id('inputEmail');

Forma::password('password')->id('inputPassword')->allowValue();

Forma::input('color')->type('color')->id('inputColor');

Forma::checkbox('confirm',1)->checked();

Forma::open()->child(Forma::checkbox('confirm',1)->omitHidden());

Forma::label()->child(Forma::checkbox('confirm'));

Forma::checkbox('confirm')->withLabel('Please Confirm');

Forma::checkbox('confirm')->id('sweeeetID')->withLabel('Please Confirm');

Forma::input('color')->type('color')->id('inputColor')->withLabel('Pick a color');

Forma::checkbox('confirm')->id('inputConfirm')->wrap('Option One',array('class'=>'checkbox'));

Forma::hidden('secret','thing');

Forma::token();

Forma::textarea('secret','thi>ng<dd')->rows(10);

Forma::radio('choice')->id('inputChoice')->wrap('Option One',array('class'=>'radio'));

Forma::file('image')->id('inputFile')->wrap('Select Image');

Forma::text('last_name')->id('inputLast')->placeholder('Enter last name');

Forma::text('last_name')->id('inputLast')->placeholder('auth.login_failed');

Forma::label('auth.login_failed');

Forma::label('<i class="fa fa-pound"></i> Price')->rawText();

Forma::select('country')->option('- Please Select -')->option('UK',1,true)->withLabel('Select Country');

Forma::select('country')->options(array('1' => 'United Kingdom', '2' => 'France', '3' => 'USA' ));

Forma::select('town', array('1' => 'Chelmsford', '2' => 'Brentwood', '3' => 'Colchester' ), 2);

Forma::checkbox('cake',1);


Forma::close();

```