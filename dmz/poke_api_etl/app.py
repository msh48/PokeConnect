#!/usr/bin/env python
from application.pokemonfetch import FetchPokemonData
import sys

def main(argv):
    strArg = str(argv[1])
    if (strArg == 'All'):
        fetchPokemonData = FetchPokemonData()
        res = fetchPokemonData.get_total_number_of_pokemon_generation(1)
        result = res['id']
        return result
    elif (strArg == 'move'):
        0
    else:
        0

if __name__ == "__main__":
   main(sys.argv[1:])