const submit = document.querySelector('#submit')

const firstname = document.querySelector('#firstname')
const lastname = document.querySelector('#lastname')
const email = document.querySelector('#email')
const telefon = document.querySelector('#telefon')
const płeć = document.querySelector('#płeć')
const usługi = document.querySelector('#usługi')
const dataa = document.querySelector('#dataa')

const emailPattern = new RegExp(/[a-z0-9\.+_-]+@[a-z0-9]+(\.[a-z0-9]+)*\.[a-z]{2,3}/i)

const liczbaKoniecznychPol = [firstname, lastname, email, telefon, płeć, usługi, dataa].length

function klikniecie() {
    console.log('click')
}

przycisk.addEventListener('click', klikniecie)

function sprawdzDlugosc(valueLength, minLength) {
    return valueLength >= minLength
}

function sprawdzZeWzorcem(value, pattern) {
    return pattern.test(value);
}

function zweryfikujDaneTekstowe() {
    this.className = sprawdzDlugosc(this.value.length, 2) ? 'validated' : 'invalid'
    sprawdzWeryfikacje()
}

function zweryfikujEmail() {
    this.className = (sprawdzDlugosc(this.value.length, 5) && sprawdzZeWzorcem(this.value, emailPattern)) ? 'validated' : 'invalid'
    sprawdzWeryfikacje()
}

function zweryfikujTelefon() {
    this.className = sprawdzDlugosc(this.value.length, 9) ? 'validated' : 'invalid'
    sprawdzWeryfikacje()
}

function sprawdzWeryfikacje() {
    const liczbaZweryfikowanychElementow = document.querySelectorAll('.validated').length

    liczbaKoniecznychPol === liczbaZweryfikowanychElementow ? przycisk.removeAttribute('disabled') : przycisk.setAttribute('disabled', true)
}

firstname = document.querySelector('#firstname')
const lastname = document.querySelector('#lastname')
const email = document.querySelector('#email')
const telefon = document.querySelector('#telefon')
const płeć = document.querySelector('#płeć')
const usługi = document.querySelector('#usługi')
const dataa 

firstname.onchange = zweryfikujDaneTekstowe
lastname.onchange = zweryfikujDaneTekstowe
email.onchange = zweryfikujEmail
telefon.onchange = zweryfikujTelefon



