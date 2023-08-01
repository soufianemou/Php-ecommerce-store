$(document).ready(()=>{


    
    function showNavbarMobile(){
        $('#menu').click(()=>{
            $('#nav2').css('left','0px')
        })
        $('#close').click(()=>{
            $('#nav2').css('left','-450px')
        })
    }
    showNavbarMobile()






    //Sign Up page
    //the function that handle the inputs fields of the signUp page
    //and prevant the submition of the form until each field match it's patern
    function signUp(){
        $('#fname').focus()   
        // Prevent form submission
        $('#userForm').on('submit', (event) => {           
            
            //this functions return true if the input fields match the patern
            function emailsub() {
                let email = $('#email').val();
                let emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*\.\w{2,}$/;
                return emailPattern.test(email);
            }
            function firstNamesub() {
                let firstName = $('#fname').val();
                let namePattern = /^[A-Za-z]+$/;
                return namePattern.test(firstName);
            }
            function lastNamesub() {
                let lastName = $('#lname').val();
                let namePattern = /^[A-Za-z]+$/;
                return namePattern.test(lastName);
            }
            function passWordsub() {
                let password = $('#password').val();
                return password.length >= 8;
            }
            function numbersub() {
                let phoneNumber = $('#num').val();
                let phonePattern = /^\+212[567]\d{8}$/;
                return phonePattern.test(phoneNumber);
            }


            let valid = emailsub() && firstNamesub() && lastNamesub() && passWordsub() && numbersub() 
            
            //prevet the submition of the form if all fields are not valid
            if (!valid) {
                event.preventDefault();
            }
        });
        
        //email function check
        function email(){
            $('#emailSpan').hide()
            $('#email').on('input',() => {
            let email = $('#email').val()
            let  emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if(emailPattern.test(email)){
                $('#email').css('color','black')
                $('#emailSpan').hide()
            }else{
                $('#email').css('color','red')
                $('#emailSpan').show()
            }
        })
        }      
        //first name function check
        function firstName(){
            $('#fnameSpan').hide()
            $('#fname').on('input',() => {
                let firstName = $('#fname').val();
                let namePattern = /^[A-Za-z]+$/;
                if (namePattern.test(firstName)) {
                    $('#fname').css('color', 'black');
                    $('#fnameSpan').hide()
                } else {
                    $('#fname').css('color', 'red');
                    $('#fnameSpan').show()
                }
            });
        }        
        //last name function check
        function lastName(){
            $('#lnameSpan').hide()
            $('#lname').on('input',() => {
                let firstName = $('#lname').val();
                let namePattern = /^[A-Za-z]+$/;
                if (namePattern.test(firstName)) {
                    $('#lname').css('color', 'black');
                    $('#lnameSpan').hide()
                } else {
                    $('#lname').css('color', 'red');
                    $(this).next().hide()
                    $('#lnameSpan').show()
                }
            });
        }       
        //passWord function check 
        function passWord(){
            $('#passwordSpan').hide()
                $('#password').on('input',() => {
                    var password = $('#password').val();
                    if (password.length >= 8) {
                        $('#password').css('color', 'black');
                        $('#passwordSpan').hide()
                    } else {
                        $('#password').css('color', 'red');
                        $('#passwordSpan').show()
                    }
                });

            $('#matchpasswordSpan').hide()
            $('#password2').on('input',()=>{
                if($('#password2').val() === $('#password').val()){
                    $('#matchpasswordSpan').hide()
                    $('#password2').css('color', 'black');
                }else{
                    $('#password2').css('color', 'red');
                    $('#matchpasswordSpan').show()
                }
            })
        }
        //number function check
        function number(){
            $('#numSpan').hide()
            $('#num').on('input', () => {
                var phoneNumber = $('#num').val();
                let phonePattern = /^\+212[567]\d{8}$/;
                if (phonePattern.test(phoneNumber)) {
                    $('#num').css('color', 'black');
                    $('#numSpan').hide()
                } else {
                    $('#num').css('color', 'red');
                    $('#numSpan').show()
                }
            });             
        }
        //city function check
        firstName()
        lastName()
        email()
        passWord()
        number()

    }
    signUp()




    
})