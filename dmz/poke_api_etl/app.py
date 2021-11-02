from application.pokemonfetch import FetchPokemonData


fetchPokemonData = FetchPokemonData()
res = fetchPokemonData.get_total_number_of_pokemon_generation(1)
print(res)