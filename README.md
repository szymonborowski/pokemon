# Pokemon API integration with Magento 2 
### v 0.0.2



## Description:

This module provide an integration with PokeAPI and allows to link pokemon data with Magento2 products.

## Installations:

Module can be installed via composer:

``` composer require szybo/pokemon ```

## Progress:
### 1. PokeAPI integration:

- [x] Develop a custom Magento2 module to integrate with the PokeAPI.

        Module name `Szybo_Pokemon`

- [x] Create a new product attribute in Magento2 for Pokemon name. This attribute should be used to map each product to a specific Pokemon.

        Attribute name `pokemon_name`
- [x] Create a new product attribute in Magento2 for Pokemon description. This attribute should be used to store the description of the Pokemon.

        Attribute name `pokemon_description` 

- [x] Utilize the PokeAPI to dynamically fetch Pokémon information based on the product's Pokemon name attribute. The endpoint for fetching Pokémon
  details is https://pokeapi.co/api/v2/pokemon/{pokemon_name} .

        `PokemonRepository` class is responsible for fetching Pokemon details from the PokeAPI.

- [ ] Dynamically update the product name with the fetched Pokémon name during runtime, without permanently saving it to the entity.

        This part of the task in not completed yet.

- [ ] Display the fetched Pokémon image on both the product listing and detail pages.

        This part of the task in not completed yet.

### 2. Product Attribute:

- [ ] Create a product attribute named "Pokemon Name" that can be assigned to products. Ensure that this attribute is available for product import and can
  be used in product listings and details.

        Part with product import has not been tested.

### 3. Product Display:

- [ ] On the product listing page, dynamically load and display Pokémon information for each product based on its assigned Pokemon name attribute. This
includes dynamically updating the product name and displaying the Pokémon image.

         This part of the task in not completed yet.

On the product detail page, display detailed Pokémon information for the selected product based on its assigned Pokemon name attribute. Include the
- [ ]  dynamically updated Pokémon name and image.

        This part of the task in not completed yet.

### 4. Caching:

- [ ] Implement caching mechanisms to avoid unnecessary API calls. Cache Pokémon data based on the product's Pokemon name attribute and clear the
  cache when necessary (e.g., when the product data is updated).

        This part of the task in not completed yet.

### 5. Configuration:

- [x] Provide a configuration option in the Magento2 admin panel where the PokeAPI base URL can be set. Ensure that the integration is flexible and can be
  easily configured.

### 6. Error Handling:

- [x] Implement proper error handling in case the PokeAPI is unreachable or returns an error response. Display meaningful error messages to users.

### 7. Magento2 Standards:

- [x] Ensure that the custom module adheres to Magento 2 coding standards and best practices.
- [x] The module should be installable through Composer.

### 8. Documentation:

- [x] Keep the code structure self-explanatory, with clear separation of concerns.
- [x] Include concise comments where necessary, explaining any complex logic or decisions.
- [x] Create a small README file providing an overview of the module's purpose, basic setup instructions, and any important considerations for future
developers.