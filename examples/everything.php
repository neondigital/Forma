<?php
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Forma\Forma;

$forma = new Forma();

echo "<pre>";


$user = new stdClass;
$user->email = 'frank@bob.com';

$forma->populate($user);

echo htmlentities($forma->open('user','GET')->class('glenn')->class('bob')->attr('id','sweet')) . "\n";

echo htmlentities($forma->open_secure('user')->files()) . "\n";

echo htmlentities($forma->text('first_name','glenn<$@£$T£!^;')->class('form-control')->attr('id','first_name')) . "\n";

echo htmlentities($forma->text('last_name')->id('inputLast')->forceEmpty()) . "\n";

echo htmlentities($forma->email('email')->id('inputEmail')->required()) . "\n";

echo htmlentities($forma->password('password')->id('inputPassword')->allowValue()) . "\n";

echo htmlentities($forma->input('color')->type('color')->id('inputColor')) . "\n";

echo htmlentities($forma->checkbox('confirm',1)->checked()) . "\n";

echo htmlentities($forma->open()->child($forma->checkbox('confirm',1)->omitHidden())) . "\n";

echo htmlentities($forma->label()->child($forma->checkbox('confirm'))) . "\n";

echo htmlentities($forma->checkbox('confirm')->withLabel('Please Confirm')) . "\n";

echo htmlentities($forma->checkbox('confirm')->id('sweeeetID')->withLabel('Please Confirm')) . "\n";

echo htmlentities($forma->input('color')->type('color')->id('inputColor')->withLabel('Pick a color')) . "\n";

echo htmlentities($forma->checkbox('confirm')->id('inputConfirm')->wrap('Option One',array('class'=>'checkbox'))) . "\n";

echo htmlentities($forma->hidden('secret','thing')) . "\n";

echo htmlentities($forma->textarea('bio')) . "\n";

echo htmlentities($forma->textarea('secret','thi>ng<dd')->rows(10)) . "\n";

echo htmlentities($forma->textarea('secret','thi>ng<dd')->rows(10)->placeholder('Enter stuff')->withLabel('Stuff')) . "\n";

echo htmlentities($forma->radio('choice')->id('inputChoice')->wrap('Option One',array('class'=>'radio'))) . "\n";

echo htmlentities($forma->file('image')->id('inputFile')->wrap('Select Image')) . "\n";

echo htmlentities($forma->text('last_name')->id('inputLast')->placeholder('Enter last name')) . "\n";

echo htmlentities($forma->text('last_name')->id('inputLast')->placeholder('auth.login_failed')) . "\n";

echo htmlentities($forma->label('auth.login_failed')) . "\n";

echo htmlentities($forma->label('<i class="fa fa-pound"></i> Price')->rawText()) . "\n";

echo htmlentities($forma->select('country')->option('- Please Select -')->option('UK',1,true)->withLabel('Select Country')) . "\n";

echo htmlentities($forma->select('country')->options(array('1' => 'United Kingdom', '2' => 'France', '3' => 'USA' ))) . "\n";

$options = array(
        'Blues' => array(
                '1' => 'Sky',
                '2' => 'Cyan',
                '3' => 'Navy'
            ),
        'Greens' => array(
                '1' => 'Apple',
                '2' => 'Leaf',
                '3' => 'Army'
            )
    );

echo htmlentities($forma->select('colours', $options, 3)) . "\n";


echo htmlentities($forma->select('town', array('1' => 'Chelmsford', '2' => 'Brentwood', '3' => 'Colchester' ), 2)) . "\n";

echo htmlentities($forma->checkbox('cake',1)) . "\n";

echo htmlentities($forma->button('Click me!!', 'submit')->class('btn btn-primary')) . "\n";

echo htmlentities($forma->submit('submit_btn','Save Changes')) . "\n";

echo htmlentities($forma->close()) . "\n";
