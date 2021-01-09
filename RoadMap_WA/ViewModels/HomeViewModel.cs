using RoadMap_WA.Data.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace RoadMap_WA.ViewModels
{
    public class HomeViewModel
    {
        /// <summary>
        /// All Road-maps of current RoadMapCategory
        /// </summary>
        public IEnumerable<FullRoadMap> AllRoadMaps { get; set; }
        /// <summary>
        /// Current RoadMapCategory
        /// </summary>
        public string RoadMapCategory { get; set; }
    }
}
