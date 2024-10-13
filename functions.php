<?php

// Validation function
function validateContactForm(array $data): array {
    $errors = [];

    // Title Validation
    if (empty($data['title'])) {
        $data['title'] = 'Mr.';
    }

    // First name and Surname Validation (required)
    if (empty($data['first_name'])) {
        $errors[] = 'First name is required.';
    }
    if (empty($data['surname'])) {
        $errors[] = 'Surname is required.';
    }

    // Birthdate Validation (required)
    if (empty($data['birth_date'])) {
        $errors[] = 'Birth date is required.';
    }

    // Phone Validation (required and format)
    if (empty($data['phone'])) {
        $errors[] = 'Phone number is required.';
    } elseif (!preg_match('/^\d{9,10}$/', $data['phone'])) {  // Example: 9 to 10 digit number
        $errors[] = 'Phone number must be a valid 9 or 10 digit number.';
    }

    // Email Validation (required and format)
    if (empty($data['email'])) {
        $errors[] = 'Email is required.';
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email format is invalid.';
    }

    return $errors;
}

// Helper function to find a contact by ID from the contacts array
function findContactById(array $contacts, int $id): ?array {
    foreach ($contacts as $contact) {
        if ($contact['id'] === $id) {
            return $contact;
        }
    }
    return null; // Return null if not found
}
?>
