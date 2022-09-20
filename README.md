# Hackers Poulette Contact Form

- Duration: 3 days

## The mission

The company Hackers Poulette ™ sells Raspberry Pi accessory kits to build your own. They want to allow their users to contact their support team. Your mission is to create a fully-functioning online "contact support" form, in PHP. It must display a contact form and process the received answer (sanitize, validate, answer the user).

## Must-have features

- [x] Use of PHP
- [x] Database with PDO connection
- [x] The form's html code must be semantically valid and accessible
- [x] In case of wrong input, the form should display a useful visual clue about the error, below the input field.
- [x] The error message must be readable and helpful to users.
- [x] The data has to be sanitised and validated (server side)
- [x] Once the form is validated, the data should be send to the database.
- [ ] Spam prevention using honeypot or captcha

## Nice-to-have

- [x] Client side validation with JavaScript
- [x] Work on a good and clear user experience (UX)
- [x] If all required inputs are valid, the script should respond by email to a given address, confirming the reception of the message. (you can use your own address for testing purposes)
- [ ] Discover composer and use it to install a PHP library such as SwiftMailer to send the email or to validate the form with library such as rakit/validation, valitron or symfony/mailer
- [ ] Protect your form against the most common attacks (CSRF, XSS, SQL injection, etc.) ressources: OWASP, OWASP Cheat Sheet XSS, OWASP Cheat Sheet SQL injection
- [ ] Create a dashboard to display the received messages (admin side) which allow to manage the messages status (handled, not handled, response, etc..) (this is a big one I know, you probably won't have time to do it all, but it's a good exercise to learn how to manage a database and a dashboard)

## Links

You can see the project by [clicking here](http://hackers.alwaysdata.net/)
