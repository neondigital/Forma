Forma
=====

IN DEVELOPMENT - But feel free to have a play!

A nice way to play with forms in both Laravel 4 and PHP. Does not require Laravel to be used.

For non-Laravel usage use the following format for calls.

```
use Forma\Forma;

$forma = new Forma();
echo $forma->email('email')->id('inputEmail')->required();
```


Clever Features
---------------

1. Auto-repopulation from Input::get() or Input::old() if value not provided
2. Auto-labels either prepended or wrapped
3. Checkboxes submit even if not checked (hidden input hack)
4. Language file support for label and option text
5. Nest tags within tags
6. Automatic ID creation for labels and fields
7. Chaining of methods to quickly do what you need and force it to behave a certain way
8. Add select options manually and from arrays, great for making a 'Please select' option



Examples
--------

```

Forma::populate($user);

Forma::open('user','GET')->class('glenn')->class('bob')->attr('id','sweet');

Forma::open_secure('article')->files();

Forma::text('first_name','glenn<$@£$T£!^;')->class('form-control')->attr('id','first_name');

Forma::text('last_name')->id('inputLast')->forceEmpty();

Forma::email('email')->id('inputEmail')->required();

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

Forma::token();   // Laravel only

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

Forma::button('Click me!!', 'submit')->class('btn btn-primary');

Forma::submit('submit_btn','Save Changes');

Forma::close();

```