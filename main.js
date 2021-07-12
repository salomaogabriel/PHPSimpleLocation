function populateCountries() {
    const countrySelect =  document.querySelector('select[name=country]')
    
    fetch('country.json')
      .then( res => res.json())
      .then( countries => {
          for (const country of countries) {
              countrySelect.innerHTML += `<option value="${country.name}">${country.name}</option>`
          }
      })
}

populateCountries()

function getStates(event) {
    const stateSelect = document.getElementById("state-select")
    const countryInput = document.getElementById("country-select");
    
    const country = event.target.value

    const indexOfSelectedCountry = event.target.selectedIndex
    countryInput.value = event.target.options[indexOfSelectedCountry].text


    const url = `subdiv/${country}.json.txt`

    stateSelect.innerHTML = "<option value=''>Select a State</option>"
    

    async function fetchStates(url) {
        const response = await fetch(url)
        
        let states = await response.json()

        //if the state name is too big, write only some part not all
        for (const state of states) {
            stateSelect.innerHTML += `<option value="${state.name}">${state.name}</option>`
        }

 
    }

    fetchStates(url)
  
  
}

document
.querySelector('select[name=country]')
.addEventListener('change', getStates)

