using RoadMap_WA.Data.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace RoadMap_WA.ViewModels
{
    public class RoadMapsListViewModel
    {
        /// <summary>
        /// Все Road-map'ы данной категории
        /// </summary>
        public IEnumerable<RoadMap> AllRoadMaps { get; set; }
        /// <summary>
        /// Данная категория
        /// </summary>
        public string RoadMapCategory { get; set; }
    }
}
