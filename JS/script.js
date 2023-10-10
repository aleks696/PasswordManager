// Global declaration of generated password for further
let generatedPassword = "";

document.getElementById('generateBtn').addEventListener('click', generateRandomPassword);

// Function to generate password from number of symbols chosen by user
function generateRandomPassword() {
    const passwordLength = document.getElementById('passwordLength').value;
    const includeSpecialCharsCheckbox = document.getElementById('includeSpecialChars');
    var p = document.getElementById('password');
    password = "";

    var charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

    // If user choose option to add special chars
    // Below these symbols add to charset
    if (includeSpecialCharsCheckbox.checked) {
        const specialChars = "!@#$%^&*()_-+=<>?";
        charset += specialChars;
    }

    // Generation of password
    for (let i = 0; i < passwordLength; i++) {
        const randomIndex = Math.floor(Math.random() * charset.length);
        password += charset[randomIndex];
    }

    // Saving generated password as global variable
    generatedPassword = password;
    // Outputting in the main page
    p.innerHTML = generatedPassword;
}

// This needs to identify if user wants to save the generated password to DB
document.getElementById('saveBtn').addEventListener('click', function (){
    // Используем значение глобальной переменной для установки скрытого поля
    document.getElementById("generatedPassword").value = generatedPassword;
    document.getElementById("password").innerHTML = "Saving password.."
})