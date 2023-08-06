<?php

// authentication/ValidationStrategy.php
interface ValidationStrategy {
    public function validate(array $data): bool;
}
