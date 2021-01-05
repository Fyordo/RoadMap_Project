using RoadMap_WA.Data.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace RoadMap_WA.Data.Intefaces
{
    interface IAllRoadMaps
    {
        /// <summary>
        /// Выдаёт все RoadMap-ы
        /// </summary>
        IEnumerable<RoadMap> RoadMaps { get; }
        /// <summary>
        /// Выдаёт все избранные RoadMap-ы
        /// </summary>
        IEnumerable<RoadMap> GetFavRMs { get; set; }
        /// <summary>
        /// Выдаёт RoadMap
        /// </summary>
        RoadMap GetObjectRoadMap(int rmID);
    }
}
